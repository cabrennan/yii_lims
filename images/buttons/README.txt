17Oct14 - CB
Buttons were created here:
http://buttonoptimizer.com/#

UM Color codes were found here: 
http://vpcomm.umich.edu/brand/style-guide/design-principles/colors
Maize: ffcb05
Blue: 00274c
Supporting color (top of button) Arboretum Blue: 024794

.css code: 


.button {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 2px 5px;
    border: 1px solid #ffcd05;
    border-radius: 12px;
    background: #024694;
    background: -webkit-gradient(linear, left top, left bottom, from(#024694), to(#1c0f62));
    background: -moz-linear-gradient(top, #024694, #1c0f62);
    background: linear-gradient(to bottom, #024694, #1c0f62);
    font: normal normal bold 10px arial;
    color: #ffcd05;
    text-decoration: none;
}
.button:hover,
.button:focus {
    border: 1px solid #ffec06;
    background: #0254b2;
    background: -webkit-gradient(linear, left top, left bottom, from(#0254b2), to(#221276));
    background: -moz-linear-gradient(top, #0254b2, #221276);
    background: linear-gradient(to bottom, #0254b2, #221276);
    color: #ffcd05;
    text-decoration: none;
}
.button:active {
    background: #012a59;
    background: -webkit-gradient(linear, left top, left bottom, from(#012a59), to(#1c0f62));
    background: -moz-linear-gradient(top, #012a59, #1c0f62);
    background: linear-gradient(to bottom, #012a59, #1c0f62);
}