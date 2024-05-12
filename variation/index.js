const express = require("express");

const app = express();
app.set("view engine", "ejs");

app.get("/", (req, res) => {
  return res.render("index.ejs");
});

app.get("/attr", (req, res) => {
  const attr = req.query.attr;
  return res.render("attr.ejs", { attr });
});

app.get("/attr_esc", (req, res) => {
  const attr = req.query.attr;
  return res.render("attr_esc.ejs", { attr });
});

app.get("/url", (req, res) => {
  const url = req.query.url;
  return res.render("url.ejs", { url });
});

app.get("/dom", (req, res) => {
  return res.render("dom.ejs");
});

const length = "attrは30文字以内です";
app.get("/length", (req, res) => {
  const attr = req.query.attr;
  if (typeof attr !== "string") {
    return res.send("error")
  }
  if (attr.length > 30) {
    return res.send(length);
  }
  return res.render("attr.ejs", { attr });
});

app.listen(3000);
