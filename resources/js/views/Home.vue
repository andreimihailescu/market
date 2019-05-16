<template>
    <div>
        <p>This is the home page.</p>

        <PassportClients></PassportClients>
        <PassportAuthorizedClients></PassportAuthorizedClients>
        <PassportPersonalAccessTokens></PassportPersonalAccessTokens>

        <button @click="getTokenNoPassword">Get Token</button>
    </div>

</template>

<script>
    import PassportClients from '../components/passport/AuthorizedClients';
    import PassportAuthorizedClients from '../components/passport/Clients';
    import PassportPersonalAccessTokens from '../components/passport/PersonalAccessTokens';

    export default {
        components: {PassportClients, PassportAuthorizedClients, PassportPersonalAccessTokens},
        name: "Home",
        methods:{
            getToken(){
                axios.post('/oauth/token', {
                    'grant_type': 'password',
                    'client_id': '4',
                    'client_secret': 'WlZV2UZXVbrIZvHLcdUTt4ZnzfBDdvt3GZ79Bq76',
                    'username': 'andrei@email.com',
                    'password': 'test1234',
                    'scope': ''
                })
                    .then(response => {
                        console.log('RESPONSE: ', response);
                    });
            },
            getTokenNoPassword(){
                axios.post('/oauth/token', {
                    'grant_type': 'client_credentials',
                    'client_id': '5',
                    'client_secret': '84UtdOQbeQCy4uZUVC9DCQETb5BnvBoPwBxAfkkF',
                    'scope': ''
                })
                    .then(response => {
                        console.log('RESPONSE: ', response);
                    });
            }
        }
    }
</script>

<style scoped>

</style>