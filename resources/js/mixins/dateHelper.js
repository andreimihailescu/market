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

            return date.toISOString().substr(0, 16);
        }
    }
};
