import React from "react";
import classes from "./Testimonal.module.css";

const testimonyPeople = [
  {
    name: "Abebe Kebede",
    testimonyMessage: "What a great platform to learn at Dot E learning",
    photoUrl:
      "https://images.unsplash.com/photo-1584418879404-85eb6c39c30c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80",
  },
  {
    name: "Almaz Ayana",
    testimonyMessage: "What a great platform to learn at Dot E learning",
    photoUrl:
      "https://images.unsplash.com/photo-1584418879404-85eb6c39c30c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80",
  },
  {
    name: "Kebde Abebe",
    testimonyMessage: "What a great platform to learn at Dot E learning",
    photoUrl:
      "https://images.unsplash.com/photo-1584418879404-85eb6c39c30c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80",
  },
];

function Testimonal() {
  return (
    <div className={classes.ourCoursesContainer}>
      <div className={classes.OurCoursesInnerContainer}>
        {/* This is testimony */}
        <div className={classes.testimonyHeader}>
          <h1>TESTIMONLIALS</h1>
          <h1 className={classes.exploreCourses}>
            Explore Our Popular Online Courses
          </h1>
        </div>

        <div className={classes.enrollContainer}>
          {testimonyPeople.map((person) => {
            return (
              <div key={person.name} className={classes.courseCard}>
                <img src={person.photoUrl} alt={person.name} />
                <div className={classes.cardDescription}>
                  <h3>{person.name}</h3>
                </div>
                <div className={classes.testimonyMessageStyle}>
                  <p>{person.testimonyMessage}</p>
                </div>
              </div>
            );
          })}
        </div>
        {/* this is the end */}
      </div>
    </div>
  );
}

export default Testimonal;
