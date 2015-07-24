/**
 * Created by Administrator on 2015/7/23.
 */
define(["avalon",
        "text!./district.html", //这是组件用到的VM
    ],
    function (avalon, barHTML) {
        function getDistrictListBy(parentId, callback) {
            parentId = parentId || 0;
            var request = $.restGet('/common/district/list-by-parent-id', {
                parentId: parentId
            });
            request.done(function (data) {
                callback(data);
            });
        }

        function getNameBy(id, list) {
            var name;
            list.map(function (v) {
                if (id == v.id) {
                    name = v.name;
                }
            });
            return name;
        }

        var widget = avalon.ui.district = function (element, data, vmodels) {
            var options = data.districtOptions; //★★★取得配置项  固定写法，这里会将默认属性 widgit.defaults 配置属性 标签内配置属性 依次注入

            var vmodel = avalon.define(data.districtId, function (vm) {//data.barId  注入可变量
                //这视情况使用浅拷贝或深拷贝avalon.mix(true, vm, options)
                avalon.mix(vm, options)
                vm.$skipArray = ['province_name', 'city_name'];

                //初始化组件的界面，最好定义此方法，让框架对它进行自动化配置
                vm.$init = function () {
                    element.innerHTML = barHTML

                    getDistrictListBy(0, function (data) {
                        vm.provinceList = data
                    })

                    if (options.province_id != '-1') {
                        getDistrictListBy(options.province_id, function (data) {
                            vm.cityList = data
                        })
                    }

                    avalon.scan(element, [vmodel].concat(vmodels))

                    if (typeof vmodel.onInit === "function") {
                        vmodel.onInit.call(element, vmodel, options, vmodels)
                    }

                }
                vm.$remove = function () {//清空构成UI的所有节点，最好定义此方法，让框架对它进行自动化销毁
                    element.innerHTML = ""
                }

                vm.provinceList = [];
                vm.cityList = [];
                vm.province_name = '';
                vm.city_name = '';
                vm.province_id = options.province_id;
                vm.city_id = options.city_id;
                vm.$watch('province_id', function (province_id) {
                    getDistrictListBy(province_id, function (data) {
                        vm.cityList = data;
                        var flag = true;
                        data.map(function (v) {
                            if (v.id == vm.city_id)
                                flag = false;
                        });
                        if(flag) vm.city_id = '-1';
                    })
                });
                vm.getDistrictInfo = function () {
                    return {
                        province_id: vm.$model.province_id,
                        province_name: getNameBy(vm.$model.province_id, vm.$model.provinceList),
                        city_id: vm.$model.city_id,
                        city_name: getNameBy(vm.$model.city_id, vm.$model.cityList)
                    }
                };
                vm.setDistrict = function (province_id, city_id) {
                    vm.province_id = province_id;
                    vm.city_id = city_id;
                }
            })
            return vmodel//必须返回组件VM
        }
        widget.defaults = {//默认配置项

            activate: avalon.noop, // 切换面板后触发的回调

            province_id: '-1',
            city_id: '-1',
        }
        return avalon
    })
