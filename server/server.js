'use strict';

let express = require('express');
let http = require('http');
let path = require('path');
let socketIO = require('socket.io');

let app = express();
let server = http.Server(app);
let io = socketIO(server);
let fs = require('fs');
let Tools = require('./Tools');

app.set('port', 8080);
app.use('/static', express.static(__dirname + '/static'));


// Routing
app.get('/', function(request, response) {
  response.sendFile(path.join(__dirname, 'input.html'));
});

app.post('', function(req, res) {
  res.sendFile(path.join(__dirname, 'input.html'));

});

server.listen(8080, "0.0.0.0");


require('dns').lookup(require('os').hostname(), function (err, add, fam) {
  console.log('addr: '+add);
})

io.on('connection', function(socket) {
  socket.on('data', function(data) {

    //fs.open
    fs.writeFile('data_' + Tools.getCurrentDate() + '.txt', data, function (err) {
      if (err) throw err;
      console.log('File saved');
    });
  });
});
