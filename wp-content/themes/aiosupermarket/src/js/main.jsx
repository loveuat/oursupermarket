import React from 'react';
import { createRoot } from 'react-dom/client';
import '../css/app.css';

function App() {
  const [count, setCount] = React.useState(0);

  return (
    <div className="rounded-xl bg-white p-8 shadow-lg">
      <h2 className="text-2xl font-bold text-blue-600">
        WordPress + React + Tailwind
      </h2>

      <p className="my-4 text-gray-600">
        React is working inside WordPress!
      </p>

      <button
        onClick={() => setCount(count + 1)}
        className="rounded-lg bg-blue-600 px-5 py-3 text-white hover:bg-blue-700"
      >
        Clicked {count} times
      </button>
    </div>
  );
}

const rootElement = document.getElementById('react-root');

if (rootElement) {
  createRoot(rootElement).render(<App />);
}
