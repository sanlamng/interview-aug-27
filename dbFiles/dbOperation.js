const config = require("./dbConfig");
const sql = require("mssql");
const { sign } = require("jsonwebtoken");

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
const getProducts = async () => {
  try {
    let pool = await sql.connect(config);
    let products = await pool
      .request()
      .query(
        `select * from tbl_product Where UserId = ${user.id} Order by TransId desc`
      );
    return products;
  } catch (error) {
    console.log(error);
  }
};
const createProduct = async (product) => {
  try {
    await sql.connect(config);
    const request = new sql.Request();
    request
      .input("UserId", sql.Int, user.id)
      .input("CustomerName", sql.NVarChar, product.CustomerName)
      .input("DOB", sql.Date, product.DOB)
      .input("Phone", sql.NVarChar, product.Phone)
      .input("Product", sql.NVarChar, product.Product)
      .input("Amount", sql.NVarChar, product.Amount)
      .input("PaymentDate", sql.Date, product.PaymentDate)
      .execute("sp_Products");
  } catch (error) {
    console.log(error);
  }
};
const createUserValidation = async (user) => {
  try {
    await sql.connect(config);
    const request = new sql.Request();
    request
      .input("FirstName", sql.NVarChar, user.FirstName)
      .input("LastName", sql.NVarChar, user.LastName)
      .input("Email", sql.NVarChar, user.Email)
      .input("SignOnName", sql.NVarChar, user.SignOnName)
      .input("UserPassword", sql.NVarChar, user.UserPassword)
      // .input("Action", sql.Int, user.Action)
      .output("ResponseMessage", sql.NVarChar)
      .execute("sp_User_Register", (err, recordsets, returnValue) => {
        console.log(recordsets.output.ResponseMessage);
      });
  } catch (error) {
    console.log(error);
  }
};
const getLogin = async (user) => {
  try {
    let pool = await sql.connect(config);
    let login = await pool
      .request()
      .query(
        `select * from tbl_Users Where SignOnName = '${user.SignOnName}'  And UserPassword = HASHBYTES('SHA2_512', '${user.UserPassword}'+CAST([Salt] AS NVARCHAR(36)))`
      );
    if (login.recordset[0] === undefined) {
      console.log("Wrong Username and Password Combination");
      console.log(login);
      return { error: "Username or Password is incorrect" };
    }

    const accessToken = sign(
      {
        username: login.recordset[0].SignOnName,
        id: login.recordset[0].UserId,
      },
      "7JUU39959Eohyue"
    );

    return accessToken;
  } catch (error) {
    console.log(error);
  }
};
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

module.exports = {
  createProduct,
  createUserValidation,
  getProducts,
  getLogin,
};
