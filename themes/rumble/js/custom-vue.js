/**
 * Created by admin on 11/01/17.
 */

new Vue({

    el: '#rumbles-app',
    data: {
        newTrackTitle: '',
        newTrackDescription: '',
        tracks: []
    },

    methods: {
        addTrack: function() {
            //alert('adding track');
            this.tracks.push(this.newTrackTitle);
        }
    },

    mounted() {

        // Make an ajax request to our server /getAllAlbums

        // $.ajax() or $.getJson() if we have JQuery library
        // axios.get('/albums/getAllAlbums').then(response => console.log(response));
        // axios.get('/albums/getAllAlbums').then(response => this.tracks = response.data);
        axios.get('/albums/getAllAlbums').then(response => this.tracks = response.data.items);

    }
});
