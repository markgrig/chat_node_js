const http = require('http');
//const { APP_PORT, APP_IP} = process.env;
const APP_PORT = 80
const APP_IP  = 'localhost'

const express = require('express');
const app = express();

const server = http.createServer(app);
const io = require('socket.io')(server);

const serverMessages = [];
const userNames = {};

app.use(express.static(`static`));

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

io.sockets.on('connection', function(socket) {
    
    const userName = "Неизвестный пользователь";
    console.log('A user connected with ', socket.id);

    //Добавление всех пользователей в чате
    Object.keys(userNames).forEach((key) => {
        socket.emit('addUser', key, userNames[key]);
    });

    //Добавление нового пользователя в список в чате 
    userNames[socket.id] = userName;
    socket.emit('userConnected', socket.id);
    io.sockets.emit('addUser', socket.id , userNames[socket.id]);
    serverMessages.forEach((el) => {socket.emit('addMes', el);})    

     //Изменение имени на указанное в поле name
    socket.on('changedName', (val) => {
        io.sockets.emit('updateName', socket.id, val);
        userNames[socket.id] = val;
    });

    //получение сообщения в общий массив
    socket.on('sendMes', (data) => {
        serverMessages.push(data);
        if(serverMessages.length > 100) serverMessages.shift();
        io.sockets.emit('addMes', data);
    });

    //отключение пользователей от чата 
    socket.on('disconnect', function () {

       console.log('A user disconnected with ', socket.id);
       io.sockets.emit('userDisconnected', userNames[socket.id] || userName); 
       io.sockets.emit('delUser', socket.id);
       delete userNames[socket.id];
    });
});

server.listen(APP_PORT, APP_IP, () => {
    console.log(`Server running at http://${APP_IP}:${APP_PORT}/`);
});

