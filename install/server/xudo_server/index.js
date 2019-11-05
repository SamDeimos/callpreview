'use strict'
//Configuracion de servidor
//Intanciar dependencias
var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var ami = require('asterisk-manager')(5038, '127.0.0.1', 'admin', 'bcga1303', true);

const port = process.env.port || 2311;

//corriendo servidor de express
server.listen(port, () => {
    console.log(`Servidor NODE JS iniciado en http://localhost:${port}`);
});

//Cliente de test
app.get('/', function (req, res) {
    res.sendFile(__dirname + '/index.html');
});
/************** Fin de configuracion del servidor ****************/

/**
 * socket.io
 */
//ALmacenar todos los usuarios
var Users = [];

// Escucha conexiones de clientes
io.on('connection', function (socket) {
    socket.on('login', function (user) {
        user.id = socket.id;
        Users.push(user);
        console.log(Users);

        /**
         * trabajar directamente con el array de los socket que almacena socket io
         * ventajas es que trabajamos con socket que persisten en el sistema no en un array
         * RUTA:
         * cliente
         *  sockets
         *      array de socket
         *          cada socket tine id, nicknane
         */
        //socket.nickname = user.nickname;
        // var clientes = io.sockets.clients();
        // console.log(clientes.sockets);
    });

    socket.on('sendmsg', function (nickname, msg) {
        Object.keys(Users).forEach(function (element, key, _array) {
            let user = Users[key];
            if (user.nickname == nickname) {
                var message = msg + ' idUser: ' + user.id;
                sender(message, user.id);
            }
        });
    });
    
});
function sender(message, userID) {
    io.to(userID).emit('msgprivade', message);
}
/************** Fin de socket.io ****************/

/**
 * Asterisk AMI
 */
// Escucha el evento newchannel capturar llamadas entrantes
ami.on('newchannel', function (evt) {
    //Envia infomacion del evento newchannel a todos los cliente conectados
    io.emit('inbounce', evt);
});
/************** Fin de Asterisk AMI ****************/



// io.on('connect', onConnect);

// function onConnect(socket){

//   // sending to the client
//   socket.emit('hello', 'can you hear me?', 1, 2, 'abc');

//   // sending to all clients except sender
//   socket.broadcast.emit('broadcast', 'hello friends!');

//   // sending to all clients in 'game' room except sender
//   socket.to('game').emit('nice game', "let's play a game");

//   // sending to all clients in 'game1' and/or in 'game2' room, except sender
//   socket.to('game1').to('game2').emit('nice game', "let's play a game (too)");

//   // sending to all clients in 'game' room, including sender
//   io.in('game').emit('big-announcement', 'the game will start soon');

//   // sending to all clients in namespace 'myNamespace', including sender
//   io.of('myNamespace').emit('bigger-announcement', 'the tournament will start soon');

//   // sending to a specific room in a specific namespace, including sender
//   io.of('myNamespace').to('room').emit('event', 'message');

//   // sending to individual socketid (private message)
//   io.to(`${socketId}`).emit('hey', 'I just met you');

//   // WARNING: `socket.to(socket.id).emit()` will NOT work, as it will send to everyone in the room
//   // named `socket.id` but the sender. Please use the classic `socket.emit()` instead.

//   // sending with acknowledgement
//   socket.emit('question', 'do you think so?', function (answer) {});

//   // sending without compression
//   socket.compress(false).emit('uncompressed', "that's rough");

//   // sending a message that might be dropped if the client is not ready to receive messages
//   socket.volatile.emit('maybe', 'do you really need it?');

//   // specifying whether the data to send has binary data
//   socket.binary(false).emit('what', 'I have no binaries!');

//   // sending to all clients on this node (when using multiple nodes)
//   io.local.emit('hi', 'my lovely babies');

//   // sending to all connected clients
//   io.emit('an event sent to all connected clients');

// };






/**
 * Otros eventos
 */
//Escucha todos los eventos de asterisk
ami.on('managerevent', function (evt) { });

// Listen for specific AMI events. A list of event names can be found at
// https://wiki.asterisk.org/wiki/display/AST/Asterisk+11+AMI+Events
ami.on('hangup', function (evt) { });
ami.on('confbridgejoin', function (evt) { });

// // Listen for Action responses.
ami.on('response', function (evt) { });

// Perform an AMI Action. A list of actions can be found at
// https://wiki.asterisk.org/wiki/display/AST/Asterisk+11+AMI+Actions
ami.action({
    'action': 'originate',
    'channel': 'SIP/myphone',
    'context': 'default',
    'exten': 1234,
    'priority': 1,
    'variable': {
        'name1': 'value1',
        'name2': 'value2'
    }
}, function (err, res) { });