import React, { useState } from "react";
import ReactDOM from "react-dom";

/**
 * Clock widget component.
 */
const Clock = () => {
    // Set state for date.
    const [date, updateDate] = useState(new Date());

    // Update date every second.
    setInterval(() => updateDate(new Date()), 1000);

    return (
        <div className="clock digital">
            <span className="hours">
                {date.getHours() >= 10
                    ? date.getHours()
                    : `0${date.getHours()}`}
            </span>
            <span className="separator">:</span>
            <span className="minutes">
                {date.getMinutes() >= 10
                    ? date.getMinutes()
                    : `0${date.getMinutes()}`}
            </span>
            <span className="separator">:</span>
            <span className="seconds">
                {date.getSeconds() >= 10
                    ? date.getSeconds()
                    : `0${date.getSeconds()}`}
            </span>
        </div>
    );
};

// Export component.
export default Clock;
