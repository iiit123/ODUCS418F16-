// Instance the tour
var tour = new Tour({
  steps: [
  {
    element: "#logo_div",
    title: "Welcome to connect",
    content: "Hey, connect is a question & answers website. Please hit next to continue a virtual tour of this website."
  },
  {
  	element: "#ask_question",
    title: "Do you have any question?",
    content: "You can ask questions and get the best possible answers from our community members."
  },
  {
  	element: "#statistics",
    title: "Visual statistics",
    content: "See the graphical representation of our website statistics over here."
  },
  {
    element: "#search_option",
    title: "Search options",
    content: "You can search for tags as well as users by selecting an appropriate option"
  },
  {
    element: "#select_ques_type",
    title: "Filter questions",
    content: "You can filter questions based on the filters provided here."
  },
  {
  	element: "#login",
  	title: "Login into connect",
  	content: "You can login/Register into our website to ask, answer, like or mark your favourite questions/answers"
  }
]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();