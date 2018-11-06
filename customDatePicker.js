var customDatePickerStuff = Marionette.Object.extend( {
    initialize: function() {
        this.listenTo( Backbone.Radio.channel( 'pikaday' ), 'init', this.modifyDatepicker );
    },
    modifyDatepicker: function( dateObject, fieldModel ) {
        dateObject.pikaday._o.firstDay = { 0: Sunday };
        dateObject.pikaday._o.disableDayFn = function( date ) {
            var disabledDays = ["2018-11-22", "2018-12-29",
                "2019-11-28", "2019-12-25", "2020-11-26", "2020-12-25", "2021-11-25",
                "2021-12-25", "2022-11-24", "2022-12-25"];

            return ( disabledDays.indexOf( moment( date ).format("YYYY-MM-DD" ) ) !== -1 );
        }
    }
} );
