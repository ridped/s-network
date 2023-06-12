//const db = require('./config');
const data_web = require('./config.json');
const rid_listeners = require('./rid_listeners');
const fs = require("fs");
const fetch = require('node-fetch');
const express = require('express');
const app = express();
var options, http, httpServer;
if (data_web.ssl === true) {
    options = {
      key: fs.readFileSync(data_web.path_key),
      cert: fs.readFileSync(data_web.path_cert)
    };
    http = require("https");
    httpServer = http.createServer(options, app);
} else {
   http = require("http");
   httpServer = http.createServer(app);
}

const { Server } = require("socket.io");
const io = new Server(httpServer, {
    cors: {
      origin: '*',
    }
});

app.get('/', async (req, res) => {
    res.redirect(data_web.domain + '/index.php');
})

var rid_users;
rid_users = [];
io.on("connection", async function(socket) {
   await rid_listeners.gtw(socket, io, data_web, rid_users);
});

httpServer.listen(data_web.port, () => {
    console.log('Port '+ data_web.port);
});;