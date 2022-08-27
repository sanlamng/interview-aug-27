import React, { useState, useEffect } from "react";
import { useHistory } from "react-router-dom";
import { Link } from "react-router-dom";
import "animate.css";
import "./Signup.css";
import { TailSpin } from "react-loader-spinner";

export const UserValidation = () => {
  const [returnedData, setReturnedData] = useState();
  const [fieldErr, setFieldErr] = useState(false);
  const [passErr, setPassErr] = useState(false);
  const [emailErr, setEmailErr] = useState(false);
  const [confirmPassword, setConfirmPassword] = useState("");
  const [isRegistering, setIsRegistering] = useState(false);
  const [userValidation, setUserValidation] = useState({
    FirstName: "",
    LastName: "",
    Email: "",
    SignOnName: "",
    UserPassword: "",
    // Action: 2,
  });

  let history = useHistory();

  const handleChange = (e) => {
    const { name, value } = e.target;

    if (name === "Action") {
      setUserValidation((prevState) => ({
        ...prevState,
        [name]: parseInt(value),
      }));
      return;
    }
    setUserValidation((prevState) => ({
      ...prevState,
      [name]: value,
    }));
  };

  const newUser = async () => {
    if (
      !userValidation.FirstName ||
      !userValidation.Email ||
      !userValidation.LastName ||
      !userValidation.SignOnName ||
      !userValidation.UserPassword
    ) {
      setFieldErr(true);
      setIsRegistering(false);
      setTimeout(function () {
        setFieldErr(false);
      }, 4000);
      return;
    }

    if (userValidation.UserPassword !== confirmPassword) {
      setPassErr(true);
      setIsRegistering(false);
      setTimeout(function () {
        setPassErr(false);
      }, 4000);
      return;
    }
    const newData = await fetch("/create/validation", {
      method: "POST",
      headers: {
        "content-type": "application/json",
        Accept: "application/json",
      },
      body: JSON.stringify({
        ...userValidation,
      }),
    }).then((res) => res.json());
    setReturnedData(newData[0]);
    history.push("/login");
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    newUser();
  };

  return (
    <section className="user-validation">
      <section className="validation-header">
        {/* <h2>Create an account</h2> */}
        <h2>Let's get you set up</h2>
        {fieldErr && (
          <p className="form-err animate__animated animate__shakeX">
            All fields must be filled
          </p>
        )}
      </section>
      <section className="user-validation-wrapper">
        <section className="double-input">
          <section className="input input-2">
            <label htmlFor="FirstName">First Name</label>
            <input
              type="text"
              name="FirstName"
              id="FirstName"
              onChange={handleChange}
            />
          </section>
          <section className="input input-2">
            <label htmlFor="LastName">Last Name</label>
            <input
              type="text"
              name="LastName"
              id="LastName"
              onChange={handleChange}
            />
          </section>
        </section>
        <section className="input input-2">
          <label htmlFor="Email">Email</label>
          <input
            type="email"
            name="Email"
            id="Email"
            onChange={handleChange}
            onBlur={() => {
              !userValidation.Email.includes("@")
                ? setEmailErr(true)
                : setEmailErr(false);
            }}
          />
        </section>
        {emailErr && (
          <p className="form-err animate__animated animate__shakeX">
            Invalid email, must include @ sign.
          </p>
        )}
        <section className="input input-2">
          <label htmlFor="SignOnName">Username</label>
          <input
            type="text"
            name="SignOnName"
            id="SignOnName"
            onChange={handleChange}
          />
        </section>
        <section className="double-input">
          <section className="input input-2">
            <label htmlFor="UserPassword">Password</label>
            <input
              type="Password"
              name="UserPassword"
              id="UserPassword"
              onChange={handleChange}
            />
          </section>
          <section className="input input-2">
            <label htmlFor="ConfirmPassord">Confirm Password</label>
            <input
              type="Password"
              name="ConfirmPassword"
              id="ConfirmPassword"
              value={confirmPassword}
              onChange={(e) => setConfirmPassword(e.target.value)}
            />
          </section>
        </section>
        {passErr && (
          <p className="form-err animate__animated animate__shakeX">
            Passwords do not match
          </p>
        )}
        <button
          type="submit"
          onClick={(e) => {
            setIsRegistering(true);
            handleSubmit(e);
          }}
          className="btn-create"
        >
          {!isRegistering ? (
            "Create Account"
          ) : (
            <TailSpin color="#FFF" height={30} width={30} />
          )}
        </button>

        <p className="redirect-login">
          Already have an account? <Link to="/login">login here</Link>
        </p>
      </section>
    </section>
  );
};
