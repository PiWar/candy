import {render} from "react-dom";
import Badge from "./components/Badge";
import Card from "./components/Card";

const root = document.getElementById("badge");
const card = document.getElementById("card");

if (root) render(<Badge/>, root);
if (card) render(<Card/>, card);

