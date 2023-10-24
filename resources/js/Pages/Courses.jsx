import React from 'react';

function Courses({ courses }) {
    return (
        <div className="container">
            <h2>List of Courses</h2>
            <ul>
                {courses.map((course) => (
                    <li key={course.id}>
                        <a href={`/courses/${course.id}`}>{course.title}</a>
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default Courses;
