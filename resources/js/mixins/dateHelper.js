export const dateHelper = {
    methods: {
        stringToDate: function (string) {
            if (typeof string !== 'string') {
                return null;
            }

            return new Date(string);
        },

        dateToString: function (date) {
            if (typeof date !== 'object') {
                return null;
            }
            const timezoneOffset = new Date().getTimezoneOffset() * 60000;
            const dateWithoutTimezone = new Date(date - timezoneOffset);
            return dateWithoutTimezone.toISOString().substr(0, 16);
        }
    }
};
