var express = require('express');
var $ = require( "jquery" );
var app = express();
var request = require('request');
var server = require('http').createServer(app);
var io = require('socket.io')(server);
server.listen(3036);


mysql = require("mysql2");

massusers = [];
connections = [];

var logi;
var pfki;

app.use(express.static('imj'));
app.use(express.static('ava'));
app.use(express.static('audio'));
app.use(express.static('jscolor'));
//app.use("/imj", express.static('imj'));

app.get('/',function(request,respons) {
  respons.sendFile(__dirname + '/chat.html');

  //res.render("room");
  pfki =request.query.pfki;
  console.log(pfki);



  if (!pfki) {
      console.log("Зашёл неизвестный!");
  }
  else {
    connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    database: "registerdb",
    password: ""
    });
      connection.connect(  function( err) {
      if (err) {
          return console.error("Ошибка: " + err.message);
      }
      else {
        console.log("Подключение к серверу MySQL успешно установлено");
      }
    });
  /*  let query ="SELECT * FROM usersrun";
   connection.query( query , (err, result,field) => {
    console.log(result);
    }
  );*/
      let query2 ="SELECT * FROM usersrun WHERE code = ?";
      connection.query( query2 , [pfki], (err2, result2,field2) => {
          if ( result2[0] !== undefined ) {
          logi = result2[0].login;
            if (!logi) { console.log("Имя не найдено в базе данных!");}
            else {
            console.log("Имя найдено в базе данных!");
            console.log(logi+' вошёл!');

            massusers[result2[0].id] = logi;
            }
          }
        }
        );
        connection.end(function(err) {
          if (err) {
            return console.log("Ошибка: " + err.message);
          }
          console.log("Подключение закрыто");
        });
        }
  });


io.sockets.on('connection', function(socket) {
  connections.push(socket);
  console.log("Подключение к socket.io успешно установлено!");
  socket.on('disconnection', function(data) {
    connections.splice(connections.indexOf(socket),1);
    console.log("Выполненно отключение от socket.io!");
  });







//обращаемся к созданному событию
  socket.on('send mess',  function(data) {
    pfki = data.pfki;
    if (!pfki) {
        console.log("Пишет неизвестный!");
    }

    else {
      connection = mysql.createConnection({
      host: "localhost",
      user: "root",
      database: "registerdb",
      password: ""
      });
        connection.connect(  function( err) {
        if (err) {
            return console.error("Ошибка: " + err.message);
        }
        else {
          console.log("Подключение к серверу MySQL успешно установлено");
        }
      });
    /*  let query ="SELECT * FROM usersrun";
     connection.query( query , (err, result,field) => {
      console.log(result);
      }
    );*/
        let query2 ="SELECT * FROM usersrun WHERE code = ?";
        connection.query( query2 , [pfki], (err2, result2,field2) => {
            logi = result2[0].login;
              if (!logi) { console.log("Имя не найдено в базе данных!");}
              else {
              console.log("Имя найдено в базе данных!");
              console.log(logi+' пишет!');

              massusers[result2[0].id] = logi;
              pfki = logi;
              io.sockets.emit( 'user write', {pfki: logi ,  color_user: data.color_user } );
              io.sockets.emit( 'add mess', {mess: data.mess, pfki: logi , color_user: data.color_user } );


              }
            }
          );
          connection.end(function(err) {
            if (err) {
              return console.log("Ошибка: " + err.message);
            }
            console.log("Подключение закрыто");
          });
          }
    //console.log(logi);

     //создание события добавления сообщения
   });


     socket.on('no send mess',  function(data) {
       pfki = data.pfki;
       if (!pfki) {
           console.log("Пишет неизвестный!");
       }

       else {
         connection = mysql.createConnection({
         host: "localhost",
         user: "root",
         database: "registerdb",
         password: ""
         });
           connection.connect(  function( err) {
           if (err) {
               return console.error("Ошибка: " + err.message);
           }
           else {
             console.log("Подключение к серверу MySQL успешно установлено");
           }
         });
       /*  let query ="SELECT * FROM usersrun";
        connection.query( query , (err, result,field) => {
         console.log(result);
         }
       );*/
           let query2 ="SELECT * FROM usersrun WHERE code = ?";
           connection.query( query2 , [pfki], (err2, result2,field2) => {
               logi = result2[0].login;
                 if (!logi) { console.log("Имя не найдено в базе данных!");}
                 else {
                 console.log("Имя найдено в базе данных!");
                 console.log(logi+' не пишет!');

                 massusers[result2[0].id] = logi;
                 pfki = logi;

                 io.sockets.emit( 'user no write', {pfki: logi} );



                 }
               }
             );
             connection.end(function(err) {
               if (err) {
                 return console.log("Ошибка: " + err.message);
               }
               console.log("Подключение закрыто");
             });
             }
       //console.log(logi);

        //создание события добавления сообщения
      });
});





//СКАЧИВАЕМ КОДЮ мОЖЕТ ПРИГОДИТСЯ)
/*
const urlencodedParser = express.urlencoded({extended: false});
var URL = 'http://localhost:3036';
request(URL, function (err, res, body) {
    if (err) throw err;
    console.log(body);
    console.log(res.statusCode);
});
*/
// тестирование подключения
/*
connection.connect(  function( err){
  if (err) {
    return console.error("Ошибка: " + err.message);
  }
  else{
    console.log("Подключение к серверу MySQL успешно установлено");
  }
});
let query ="SELECT * FROM usersrun";
connection.query( query , (err, result,field) => {
console.log(result);
}
);
// закрытие подключения
connection.end(function(err) {
if (err) {
  return console.log("Ошибка: " + err.message);
}
console.log("Подключение закрыто");
});
*/
