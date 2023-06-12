// connection database

const mysql = require('mysql')

const koneksi = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'sn',
  charset: 'utf8mb4'
});

koneksi.connect((err) => {
	if (err) console.log(err)
})

// exports koneksi
module.exports = koneksi