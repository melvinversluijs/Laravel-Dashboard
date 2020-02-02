import React from "react";
import ReactDOM from "react-dom";

// Components.
import Clock from "./widgets/Clock";

/**
 * Dashboard component.
 */
export const Dashboard = () => {
    const widgets = window.widgets;
    const components = {
        clock: Clock
    };

    if (widgets !== undefined) {
        return widgets.map(widget => {
            const ComponentName = components[widget.component];
            return (
                <div key={widget.id}>
                    <ComponentName />
                </div>
            );
        });
    }

    return <div>No widgets found.</div>;
};

// Insert component in element with id: 'dashboard'.
const element = document.getElementById("dashboard");
if (element) {
    ReactDOM.render(<Dashboard />, element);
}
