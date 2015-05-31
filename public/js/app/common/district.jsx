define(['react'], function(React) {

    var District = React.createClass({
        getInitialState: function() {
            return {
                province: [],
                city: []
            };
        },
        handleChange: function(event) {
            var request = $.restGet('/common/district/list-by-parent-id', {
                parentId: event.target.value
            });
            request.done(function(data) {

                this.setState({
                    city: data
                });
            }.bind(this));
        },
        render: function () {
            var value = this.state.value;
            return (
                <div>
                    <div className="col-md-3">
                        <select onChange={this.handleChange} className="form-control" name={this.props.name + '_province'}>
                            <option>请选择</option>
                            {
                                this.state.province.map(function(province) {
                                    return <option value={province.id}>{province.name}</option>
                                })
                            }
                        </select>
                    </div>
                    <div className="col-md-3">
                        <select className="form-control" name={this.props.name + '_city'}>
                            {
                                this.state.city.map(function(city) {
                                    return <option value={city.id}>{city.name}</option>
                                })
                            }
                        </select>
                    </div>
                </div>
            );
        },
        componentDidMount: function() {
            var request = $.restGet('/common/district/list-by-parent-id',{
                parentId: 0
            });

            request.done(function(data){
                this.setState({
                    province: data
                });
            }.bind(this));
        }
    });


    function renderTo(dom, name) {
        React.render(
            <District name={name}/>,
            $(dom).get(0)
        );
    }

    return {
        renderTo: renderTo
    };
});
