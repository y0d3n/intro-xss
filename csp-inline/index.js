const express = require("express");
const { expressCspHeader, INLINE } = require("express-csp-header");

const app = express();
app.set("view engine", "ejs");

app.use(expressCspHeader({
  directives: {
    "script-src": [INLINE],
  },
}));

app.get("/", (req, res) => {
  const name = req.query.name ?? "";
  if (name !== "") {
    return res.send(`${name}さん、こんにちは👋`);
  }
  return res.render("index.ejs");
});

app.listen(3000);
