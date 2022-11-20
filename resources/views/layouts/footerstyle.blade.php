<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
 
    <style media="screen">

html {
  height: 100%;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

body {
  position: relative;
  padding-bottom: 13rem;
  min-height: 100%;
}

footer {

  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  /** margin-top:40px; **/
  background-color: #FFFFFF;
  color: #121315;
  font-size: 12px;
  /** font-size: 16px; **/

}
footer * {
  font-family: "Poppins", sans-serif;
  box-sizing: border-box;
  border: none;
  outline: none;
}
.social i {
  color: #1867e6;
  font-size: 1.7em;
  margin-top: 0.5em;
}
footer .row {
  padding: 1em 1em;
}
.row.primary {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 2fr;
  align-items: stretch;
}
.column {
  width: 100%;
  display: flex;
  flex-direction: column;
  padding: 0 2em;
  min-height: 15em;
}
h3 {
  width: 100%;
  text-align: left;
  color: #121315;
  font-size: 1.4em;
  white-space: nowrap;
}
ul {
  list-style: none;
  display: flex;
  flex-direction: column;
  padding: 0;
  margin: 0;
}

ul li a {
  color: #121315;
  text-decoration: none;
}
ul li a:hover {
  color: #2a8ded;
}
.about p {
  text-align: justify;
  line-height: 2;
  margin: 0;
}
@media screen and (max-width: 850px) {
  .row.primary {
    grid-template-columns: 1fr;
  }

}
    </style>