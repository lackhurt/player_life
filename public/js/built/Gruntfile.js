/*
 * grunt
 * http://gruntjs.com/
 *
 * Copyright (c) 2012 "Cowboy" Ben Alman
 * Licensed under the MIT license.
 * https://github.com/gruntjs/grunt/blob/master/LICENSE-MIT
 */

module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-contrib-requirejs');

    grunt.initConfig({
        requirejs: {
            compile: {
                options: {
                    baseUrl: "../",
                    mainConfigFile: "../config.js",
                    //name: "path/to/almond", // assumes a production build using almond
                    include: ['app/user/info/base.js'],
                    out: "./optimized.js"
                }
            },
            mobile: {
                options: {
                    baseUrl: "../",
                    mainConfigFile: "../config.js",
                    //name: "path/to/almond", // assumes a production build using almond
                    include: ['app/user/info/base.js'],
                    out: "./optimized_mobile.js"
                }
            }
        }
    });

    grunt.registerTask('default', ['requirejs']);
};
