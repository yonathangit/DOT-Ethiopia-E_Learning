import React from "react";
import Hero from "./hero/Hero";
import AboutCard from "../Aboutpage/AboutCard";
import Testimonal from "../Testimonalpage/Testimonal";
import CoursesCard from "../Coursespage/CoursesCard";
const Home = () => {
  return (
    <>
      <Hero />
      <AboutCard />
      <CoursesCard />
      <Testimonal />
    </>
  );
};

export default Home;
