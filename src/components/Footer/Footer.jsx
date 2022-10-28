import React from "react";
import "./Footer.css";

const Footer = () => {
  return (
    <>
      <footer>
        <div className="container padding">
          <div className="box logo">
            <div className="CompanyLogo">
              <a href="/">
                <img
                  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJNd25ZJCCX2inSyJT9C7cS-L8VgN66oPTS55-ubm22g&s"
                  alt="Dot ethiopia logo"
                />
              </a>
            </div>
            <div>
              <h3>ONLINE EDUCATION & LEARNING</h3>
            </div>

            <i className="fab fa-facebook-f icon"></i>
            <i className="fab fa-twitter icon"></i>
            <i className="fab fa-instagram icon"></i>
          </div>
          <div className="box link">
            <h3>Explore</h3>
            <ul>
              <li>About Us</li>
              <li>Courses</li>
              <li>Contact us</li>
              <li>Register</li>
              <li>Login</li>
            </ul>
          </div>

          <div className="box last">
            <h3>Have a Questions?</h3>
            <ul>
              <li>
                <i className="fa fa-map"></i>
                Bole Subcity, Woreda 04, House No. 378 (GMA Building 2nd Floor)
              </li>
              <li>
                <i className="fa fa-phone-alt"></i>
                +251 116 673 259
              </li>
              <li>
                <i className="fa fa-paper-plane"></i>
                ethiopia@dotrust.org
              </li>
            </ul>
          </div>
        </div>
      </footer>
      <div className="legal">
        <p>
          Copyright ©2022 All rights reserved | This template is made by
          E-learning System.
        </p>
      </div>
    </>
  );
};

export default Footer;
