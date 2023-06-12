// bad idea
const db = require('./config');
module.exports.gtw = async (socket, io, data_web, rid_users) => {
    const user = { socket : socket };
    socket.on("connected", function(data) {
        user.id = data;
        rid_users[data] = user;
        //rid_users[data] ? rid_users[data].push(socket, socket.id, data) : rid_users[data] = [socket, socket.id, data]
        socket.join(data);
        console.log('Joined', data);
    });

    socket.on("typing", function(data) {
        if (typeof rid_users[data.to_id] === "undefined") return;
        if (data.another == true) {
            rid_users[data.to_id].socket.emit("typing", data);
        } else {
            rid_users[data.id_user].socket.emit("typing", data);
        }
    });

    socket.on("receivedMessage", function(data) {
        console.log(data);
        let from_id = data.from_id;
        let to_id = data.to_id;
        let pesanya = data.pesanya;
        let time = data.time;
        db.query(`INSERT INTO rid_messages VALUES (null, "${from_id}", "${to_id}", "${pesanya}", "${time}", "0", "0", "0")`);
        if (data.first === true) {
            db.query(`INSERT INTO rid_chats VALUES (null, "${from_id}", "${to_id}")`);
            db.query(`INSERT INTO rid_chats VALUES (null, "${to_id}", "${from_id}")`);
        }
        if (typeof rid_users[data.to_id] === "undefined") return;
        rid_users[data.to_id].socket.emit("receivedMessage", data);
    });

    socket.on("disconnect", function(reason) {
        delete rid_users[user.id];
    })
}