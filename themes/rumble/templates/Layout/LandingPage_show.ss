<h1>Show yourself</h1>
<% loop $Region %>
    <p>Album: $albumTitle</p>
<% end_loop %>

<% loop $Tracks %>
    <p>$Pos: $trackTitle</p>
<% end_loop %>

