import React from "react";
import classes from "./Head.module.css";
import { Link } from "react-router-dom";
const Head = () => {
  return (
    <>
      <section className={classes.HeadContainer}>
        <div className={classes.flexSB}>
          <div className={classes.LogoContainer}>
            <div className={classes.CompanyLogo}>
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
          </div>

          <div className={classes.SocialLinks}>
            <Link to="/" className="fab fa-linkedin icon"></Link>
            <Link to="/" className="fab fa-facebook icon"></Link>
            <Link to="/" className="fab fa-instagram icon"></Link>
            <Link to="/" className="fab fa-twitter icon"></Link>
            <Link to="/" className="fab fa-youtube icon"></Link>
          </div>
        </div>
      </section>
    </>
  );
};

export default Head;
