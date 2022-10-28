// import { Button } from "@mui/material";
import React from "react";
import classes from "./HomeCourses.css";
import { useNavigate } from "react-router-dom";
// import { coursesCard } from "../../../dummydata";

// A dummy data just to fill the courses card contents like image and course title,
// clicking on the "ENROLL NOW" buttons will navigate to a single course page which
// the path is defined in "pathUrl"(this is example with a dummy data)

const EnrollCoursesDummyData = [
  {
    title: "Introduction to Python",
    pathUrl: "/courses/intro-to-python",
    path: "/courses",
    photoUrl:
      "https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80",
  },
  {
    title: "Introduction to Web Development",
    pathUrl: "/courses/intro-to-web-development",
    path: "/courses",
    photoUrl:
      "https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80",
  },
  {
    title: "Introduction to JavaScript",
    pathUrl: "/courses/intro-to-JavaScript",
    path: "/courses",
    photoUrl:
      "https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80",
  },
];

function HomeCourses() {
  const navigate = useNavigate();

  const handleOurCourses = () => {
    navigate("/courses");
  };

  const handleEnrollNow = (course) => {
    navigate(course.path);
  };

  return (
    <div className={classes.ourCoursesContainer}>
      <div className={classes.OurCoursesInnerContainer}>
        <div className={classes.promoSection}>
          <h3>100+ Online Courses</h3>
          <h3>Expert Instructors</h3>
          <h3>Life Time Access</h3>
          <h3>All Free Courses</h3>
        </div>

        <div>
          <button
            onClick={handleOurCourses}
            className={classes.ourCoursesHeading}
          >
            <h2>Our Courses</h2>
          </button>
          <h1 className={classes.exploreCourses}>
            Explore Our Popular Online Courses
          </h1>
        </div>

        <div className={classes.enrollContainer}>
          {EnrollCoursesDummyData.map((course) => {
            return (
              <div key={course.pathUrl} className={classes.courseCard}>
                <img src={course.photoUrl} alt={course.title} />
                <div className={classes.cardDescriptions}>
                  <h3>{course.title}</h3>
                </div>
                <div>
                  <button
                    onClick={() => handleEnrollNow(course)}
                    className={classes.enrollNowButton}
                  >
                    ENROLL NOW
                  </button>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </div>
  );
}

export default HomeCourses;
