import React, { useState, useEffect, useContext } from "react";
import { AuthContext } from "./helpers/AuthContext";
import { Link, useHistory } from "react-router-dom";
import { TailSpin } from "react-loader-spinner";
import "./Signup.css";

export const UserLogin = () => {
  const [returnedData, setReturnedData] = useState([]);
  const { setAuthState } = useContext(AuthContext);
  const [isLoggingIn, setIsLoggingIn] = useState(false);
  const [fieldErr, setFieldErr] = useState(false);
  const [userLogin, setUserLogin] = useState({
    Email: "",
    SignOnName: "",
    UserPassword: "",
  });

  let history = useHistory();

  const handleChange = (e) => {
    const { name, value } = e.target;

    setUserLogin((prevState) => ({
      ...prevState,
      [name]: value,
    }));
  };

  const newLogin = async () => {
    try {
      const newData = await fetch("/get_login", {
        method: "POST",
        headers: {
          "content-type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify({
          ...userLogin,
        }),
      }).then((res) => res.json());

      console.log(newData);
      //storing our accessToken to the local storage if there is no error
      if (newData.error) {
        setFieldErr(true);
        setTimeout(function () {
          setFieldErr(false);
        }, 4000);
        setIsLoggingIn(false);
      } else {
        localStorage.setItem("accessToken", newData);
        setAuthState(true);
        history.push("/");
      }
      setReturnedData(newData);
    } catch (error) {
      console.log(error);
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    newLogin();
  };

  return (
    <section className="user-validation">
      <section className="validation-header">
        <h2>Sign in to your account</h2>
        {fieldErr && (
          <p className="form-err animate__animated animate__shakeX">
            Username or Password is incorrect
          </p>
        )}
      </section>
      <section className="user-validation-wrapper">
        {/* <section className="input input-2">
          <label htmlFor="Email">Email</label>
          <input type="email" name="Email" id="Email" onChange={handleChange} />
        </section> */}
        <section className="input input-2">
          <label htmlFor="SignOnName">Username</label>
          <input
            type="text"
            name="SignOnName"
            id="SignOnName"
            onChange={handleChange}
          />
        </section>
        <section className="input input-2">
          <label htmlFor="UserPassword">Password</label>
          <input
            type="password"
            name="UserPassword"
            id="UserPassword"
            onChange={handleChange}
          />
        </section>
        <button
          className="btn-create"
          type="submit"
          onClick={(e) => {
            setIsLoggingIn(true);
            handleSubmit(e);
          }}
        >
          {isLoggingIn ? (
            <TailSpin color="#FFF" height={25} width={25} />
          ) : (
            "Sign in"
          )}
        </button>
        <p className="redirect-login">
          Not a member yet? <Link to="/register">sign-up here</Link>
        </p>
      </section>
    </section>
  );
};
