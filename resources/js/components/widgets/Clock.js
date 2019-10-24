import React, { useState } from 'react';
import ReactDOM from 'react-dom';

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
            <span className="hours">{date.getHours()}</span>
            <span className="separator">:</span>
            <span className="minutes">{date.getMinutes()}</span>
            <span className="separator">:</span>
            <span className="seconds">{date.getSeconds()}</span>
        </div>
    );
};

// Export component.
export default Clock;

// Insert component in element with id: 'clock'
const element = document.getElementById('clock');
if (element) {
    ReactDOM.render(<Clock />, element);
}