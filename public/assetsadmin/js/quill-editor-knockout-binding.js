ko.bindingHandlers.quill = {
  init: function (
    element,
    valueAccessor,
    allBindings,
    viewModel,
    bindingContext
  ) {
    
    const toolbarOptions = [
      [
        {
          font: [],
        },
      ],
      [
        {
          size: ["small", false, "large", "huge"],
        },
      ], // custom dropdown
      [
        {
          header: [1, 2, 3, 4, 5, 6, false],
        },
      ],
      [
        {
          header: 1,
        },
        {
          header: 2,
        },
      ], // custom button values
      ["bold", "italic", "underline", "strike"], // toggled buttons
      ["blockquote", "code-block"],
    //   ["link","formula"],
      ["link", "image", "video", "formula"],
      [
        {
          list: "ordered",
        },
        {
          list: "bullet",
        },
        {
          list: "check",
        },
      ],
      [
        {
          script: "sub",
        },
        {
          script: "super",
        },
      ], // superscript/subscript
      [
        {
          indent: "-1",
        },
        {
          indent: "+1",
        },
      ], // outdent/indent
      [
        {
          direction: "rtl",
        },
      ], // text direction
      [
        {
          color: [],
        },
        {
          background: [],
        },
      ], // dropdown with defaults from theme
      [
        {
          align: [],
        },
      ],

      ["clean"], // remove formatting button
    ];

    var quill = new Quill("#editor", {
      modules: {
        toolbar: toolbarOptions,
      },
      theme: "snow",
    });
  },

  update: function (
    element,
    valueAccessor,
    allBindings,
    viewModel,
    bindingContext
  ) {
    
  },
};