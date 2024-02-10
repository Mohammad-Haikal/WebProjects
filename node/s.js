// var http = require('http');
// var date = require('./dateModule');
// var fs = require('fs');

// http.createServer(function (req, res) {
//   res.writeHead(200, { 'Content-Type': 'text/html' });
//   res.write("<strong style='color:red'>Heading: </strong>The date and time are currently: " + date.myDateTime());
//   res.end();
//   record();
// }).listen(80);

// function record() {
//   fs.appendFile('visitors.txt', 'New Visitor! - ' + date.myDateTime() + '\n', function (err) {
//     if (err) throw err;
//     console.log('recorded!');
//   });
// }



var nodemailer = require('nodemailer');

// Create the transporter with the required configuration for Outlook
// change the user and pass !
var transporter = nodemailer.createTransport({
  host: "smtp-mail.outlook.com", // hostname
  secureConnection: false, // TLS requires secureConnection to be false
  port: 587, // port for secure SMTP
  tls: {
    ciphers: 'SSLv3'
  },
  auth: {
    user: 'mohammad.haikal@htu.edu.jo',
    pass: 'Muh#5322'
  }
});

// setup e-mail data, even with unicode symbols
var mailOptions = {
  from: '<mohammad.haikal@htu.edu.jo>', // sender address (who sends)
  to: 'muhhl2000@gmail.com', // list of receivers (who receives)
  subject: 'Hello ', // Subject line
  text: 'Hello world ', // plaintext body
  html: `<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
      <title>You are the best</title>
      <style>
          body{
              font-family: 'Outfit', sans-serif;
              margin: 0;
          }
          div{
              color: whitesmoke;
              width: 400px;
              height: 300px;
              background-color: #ff69e6;
              padding: 20px;
              border-radius: 8px;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
          }
          div h2{
              text-align: center;
          }
          div main{
              text-align: center;
          }
          div img{
              width: 200px;
              height: 200px;
          }
      </style>
  </head>
  <body>
      <div>
          <main>
              <img src="http://127.0.0.1:5500/s.png" >
          </main>
          <h2>Hisham is the best student in HTU</h2>
      </div>
      
  </body>
  </html>
  `,
};

// send mail with defined transport object
transporter.sendMail(mailOptions, function (error, info) {
  if (error) {
    return console.log(error);
  }

  console.log('Message sent: ' + info.response);
});