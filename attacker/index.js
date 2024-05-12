const express = require("express");
const app = express();

app.use(express.static('public'));

app.get("/", (req, res) => {
  console.log(req.query);
  return res.send("ok");
});

app.listen(3000);
