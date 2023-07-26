import './bootstrap';
import ReactDOM from 'react-dom';

const root= document.getElementById('root');
 
//On lance React que sur les pages avec React
if (root){
ReactDOM.createRoot(root).render(
    <h1>React + Laravel 🦾</h1>
);
}