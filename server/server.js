'use strict';


var express = require('express');
var http = require('http');
var path = require('path');
var socketIO = require('socket.io');

var app = express();
var server = http.Server(app);
var io = socketIO(server);

app.set('port', 54070);
app.use('/static', express.static(__dirname + '/static'));

// Routing
app.get('/', function(request, response) {
  response.sendFile(path.join(__dirname, 'index.html'));
});

// Starts the server.
server.listen(54070, "0.0.0.0");

// Add the WebSocket handlers
io.on('connection', function(socket) {
});


require('dns').lookup(require('os').hostname(), function (err, add, fam) {
  console.log('Starting sever at addr: '+add);
})
