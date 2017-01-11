/**
 * Created by admin on 11/01/17.
 */

new Vue({

    el: '#rumbles-app',
    data: {
        newTrackTitle: '',
        newTrackDescription: '',
        tracks: ['Track1', 'Track2', 'Track3', 'Track4']
    },

    methods: {
        addTrack: function() {
            //alert('adding track');
            this.tracks.push(this.newTrackTitle);
        }
    }
});
