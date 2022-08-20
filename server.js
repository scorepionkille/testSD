let express = require('express');
let app = express();
let bodyParser = require('body-parser');
let mysql = require('mysql');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extends: true}));

// homepage Route
app.get('/',(req,res) =>{
  return res.send({
    error: false, 
    message: 'ลงทะเบียนโคจวิด-19',
    written_by: 'Adisorn',
    published_on: 'http://sap-b.com'
  })
})

// connection to mysql database
let dbcon = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database:'testnode'
})

dbcon.connect();

// retrieve all user
app.get('/showuser',(req,res) =>{
  dbcon.query('SELECT * FROM users', (error, results, fields) => {
    if (error) throw error;
    
    let message = ""
    if(results === undefined || results.length == 0){
      message = "ไม่มีข้อมูลอยู่ข้างใน";
    }else{
      message = "มีข้อมูลอยู่";
    }
    return res.send({error: false, data: results, message: message});
  })
})

// retrieve user by id
app.get('/showuser/:id', (req, res) =>{
  let id = req.params.id;
  if (!id) {
    return res.status(400).send({ error: true, message: "ไม่มีข้อมูล"});
  }else{
    dbcon.query("SELECT * FROM users WHERE id = ?", id, (error,results,fields) =>{
      if(error) throw error;

      let message ="";
      if(results === undefined || results.length == 0){
        message = "ไม่พบข้อมูล";
      }else{
        message = "เรียบร้อย";
      }
      return res.send({error: false, data: results[0], message: message})


    })
  }
})

// update user with id
app.put('/showuser', (req,res) =>{
  let id = req.body.id;
  let name = req.body.name;
  let sname = req.body.sname;
  let nage = req.body.nage;

  // validation
  if (!id || !name || !sname || !nage) {
    return res.status(400),send({error :true, message:"กรุณากรอกข้อมูลเพื่ออัพเดท"});
  }else{
    dbcon.query('UPDATE users SET fname = ?, lname = ? , age = ? WHERE id = ?', 
    [name,sname,nage,id], (error, results,fields) => {
      if(error) throw error;

      let message = "";
      if (results.changedRows === 0) {
        message ="เก็บข้อมูลไม่สำเร็จ";
      }else{
        message = "เก็บข้อมูลเรียบร้อยแล้ว";
      }
      return res.send({error:false , data:results , message : message });
    })
  }
})

// delete user by id
app.delete('/showuser',(req , res) =>{
  let id = req.body.id;

  //validation
  if(!id){
    return res.status(400).send({error: true,message:"กรุณาระบบ id"});  
  }else{
    dbcon.query('DELETE FROM users WHERE id = ?',[id],(error, results ,fields)=>{
      if(error) throw error;

      let message = "";
      if(results.affectedRows === 0){
        message = "ไม่พบ user อยู่ในระบบ";
      }else{
        message = "ลบ user ออกจากระบบเรียบร้อยแล้ว";
      }
      return res.send({error: false, data:results , message : message});

    })
  }
})




// add a new user
app.post('/users', (req,res) =>{
  let name = req.body.name; //ตัวแปรของ user input เข้าตัวแปรใน database
  let sname = req.body.sname;
  let nage = req.body.nage;
  // validation 
  if (!name || !sname || !nage) {
    return res.status(400).send({error: true, message: 'กรุณากรอกชื่อ-นามสกุล'});
  }else{
    dbcon.query('INSERT INTO users (fname,lname,age) VALUES (?,?,?)',[name,sname,nage],(error, results,fields) =>{
      if (error) throw error;
      return res.send({error: false,data: results ,message:"บันทึกเรียบร้อย"})
    })
  }
});



app.listen(3000,() => {
  console.log('port : 3000');
})

module.exports = app;