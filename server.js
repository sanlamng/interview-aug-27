const express = require("express");
const cors = require("cors");
const dbOperation = require("./dbFiles/dbOperation");
const app = express();

let port = process.env.PORT || 5000;

const api = require("./Routes/api");
const create = require("./Routes/create");

app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cors());

app.use("/api", api);
app.use("/create", create);

//---------------------------------------------------------------
app.post("/get_login", async (req, res) => {
  const result = await dbOperation.getLogin(req.body);
  res.json(result);
});
//---------------------------------------------------------------

app.listen(port, () => {
  console.log(`Listening on port ${port}`);
});
