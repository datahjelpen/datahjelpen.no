const defaultParagraphSeparatorString = 'defaultParagraphSeparator'
const formatBlock = 'formatBlock'
const addEventListener = (parent, type, listener) => parent.addEventListener(type, listener)
const appendChild = (parent, child) => parent.appendChild(child)
const createElement = tag => document.createElement(tag)
const queryCommandState = command => document.queryCommandState(command)
const queryCommandValue = command => document.queryCommandValue(command)

const ContextMenu = function() {
  this.showing = false;

  this.contextMenu = document.createElement('div');
  this.contextMenu.classList = 'context-menu';
  document.documentElement.appendChild(this.contextMenu);

  this.generate = function(features, context) {
    this.contentBox = document.querySelector('.pell-content');

    if (features == 'defaults') {
      let menuOptions = document.createElement('ul');
      menuOptions.classList.add('context-menu-options');


      let actionBar = document.querySelector('.pell-actionbar');
      for (var i = 0; i < actionBar.childNodes.length; i++) {
        var showInPopUp = actionBar.childNodes[i].getAttribute('data-showinpopup');

        if (showInPopUp == 'true') {
          var option = document.createElement('li');
          option.classList.add('context-menu-option');
          option.appendChild(document.createTextNode(actionBar.childNodes[i].getAttribute('title')));
          option.innerHTML = actionBar.childNodes[i].innerHTML;

          (function(i, contentBox) {
            option.onclick = event => {
              contentBox.focus();
              // actionBar.childNodes[i].focus();
              actionBar.childNodes[i].click();
            }
          })(i, this.contentBox);

          menuOptions.appendChild(option);
        }
      }

      this.contextMenu.appendChild(menuOptions);
    }

    if (features == 'widths') {
      let menuOptions = document.createElement('ul');
      menuOptions.classList.add('context-menu-options');

      let optionWidth100 = document.createElement('li');
      optionWidth100.classList.add('context-menu-option');
      optionWidth100.appendChild(document.createTextNode('Width: 100%'));
      // if (context.target.classList.contains('content-width-100')) {
      //   optionWidth100.classList.add('cmo-active')
      // }
      optionWidth100.onclick = event => {
        context.target.classList.toggle('content-width-100');
      }
      menuOptions.appendChild(optionWidth100);

      let optionWidthMax100 = document.createElement('li');
      optionWidthMax100.classList.add('context-menu-option');
      optionWidthMax100.appendChild(document.createTextNode('Width: max 100%'));
      // if (context.target.classList.contains('content-max-width-100')) {
      //   optionWidthMax100.classList.add('cmo-active')
      // }
      optionWidthMax100.onclick = event => {
        context.target.classList.toggle('content-max-width-100');
      }
      menuOptions.appendChild(optionWidthMax100);

      this.contextMenu.appendChild(menuOptions);
    }

    window.feather.replace();
  }

  // this.optionClick = function

  this.show = function(x, y) {
    if (!this.showing) {

      if (this.contextMenu.childNodes.length > 0) {
        this.contextMenu.classList.add('cm-open');
      }

      this.showing = true;
    }

    this.contextMenu.style.left = x+'px';
    this.contextMenu.style.top = y+'px';
  }

  this.hide = function(x, y) {
    this.showing = false;
    this.contextMenu.classList.remove('cm-open');
  }

  this.clean = function() {
    while (this.contextMenu.firstChild) {
      this.contextMenu.removeChild(this.contextMenu.firstChild);
    }
  }
}
let pellContextMenu = new ContextMenu(); // Init
function getCaretPosition(editableDiv) {
  function getCaretLineElement(node, editableDiv) {
    if (node.parentNode == editableDiv) {
      return node;
    }

    if (node.parentNode == document.documentElement) {
      return false;
    }

    return getCaretLineElement(node.parentNode, editableDiv);
  }

  function getCaretFocusedElement() {
    if (window.getSelection) {
      return window.getSelection().focusNode;
    }
  }

  function getCaretLineNumber(node, editableDiv) {
    for (var i = editableDiv.childNodes.length - 1; i >= 0; i--) {
      if (node == editableDiv.childNodes[i]) {
        return i;
      }
    }

    return false;
  }

  function getCaretPositionInLine(lineElement) {
    var caretPos = 0, sel, range;
    if (window.getSelection) {
      sel = window.getSelection();
      if (sel.rangeCount) {
        range = sel.getRangeAt(0);
        caretPos = range.endOffset;
      }
    }

    return caretPos;
  }

  let focusedElement = getCaretFocusedElement();
  let lineElement = getCaretLineElement(focusedElement, editableDiv);
  let caretX = getCaretPositionInLine(lineElement);
  let caretY = getCaretLineNumber(lineElement, editableDiv);

  return [caretX, caretY, focusedElement, lineElement];
}
export const exec = (command, value = null) => document.execCommand(command, false, value)

const defaultActions = {
  undo: {
    icon: '&#8617;',
    title: 'Undo',
    result: () => exec('undo')
    },
  redo: {
    icon: '&#8618;',
    title: 'Redo',
    result: () => exec('redo')
    showInPopUp: true,
    id: 'pell-button-heading2',
    showInPopUp: true,
    id: 'pell-button-heading3',
    showInPopUp: true,
    id: 'pell-button-heading4',
  paragraph: {
    id: 'pell-button-paragraph',
  },
  bold: {
    icon: '<strong>B</strong>',
    showInPopUp: false,
    id: 'pell-button-bold',
    title: 'Bold',
    state: () => queryCommandState('bold'),
    result: () => exec('bold')
  },
  italic: {
    icon: '<em>I</em>',
    showInPopUp: false,
    id: 'pell-button-italic',
    title: 'Italic',
    state: () => queryCommandState('italic'),
    result: () => exec('italic')
  },
  underline: {
    icon: '<u>U</u>',
    showInPopUp: false,
    id: 'pell-button-underline',
    title: 'Underline',
    state: () => queryCommandState('underline'),
    result: () => exec('underline')
  },
  strikethrough: {
    showInPopUp: false,
    icon: '<strike>S</strike>',
    title: 'Strike-through',
    state: () => queryCommandState('strikeThrough'),
    result: () => exec('strikeThrough')
  },
  // heading1: {
  //   icon: '<b>H<sub>1</sub></b>',
  //   title: 'Heading 1',
  //   result: () => exec(formatBlock, '<h1>')
  // },
  heading2: {
    icon: '<b>H<sub>2</sub></b>',
    title: 'Heading 2',
    result: () => exec(formatBlock, '<h2>')
  },
  heading3: {
    icon: '<b>H<sub>3</sub></b>',
    title: 'Heading 3',
    result: () => exec(formatBlock, '<h3>')
  },
  heading4: {
    icon: '<b>H<sub>4</sub></b>',
    title: 'Heading 4',
    result: () => exec(formatBlock, '<h4>')
    showInPopUp: true,
    },
  paragraph: {
    icon: '&#182;',
    title: 'Paragraph',
    result: () => exec(formatBlock, '<p>')
    id: 'pell-button-justifyLeft',
  },
  justifyCenter: {
    icon: 'C',
    showInPopUp: true,
    id: 'pell-button-justifyCenter',
    title: 'Justify Center',
    result: () => exec('justifyCenter')
  },
    showInPopUp: true,
    id: 'pell-button-justifyRight',
  justifyFull: {
    icon: 'J',
    showInPopUp: true,
    id: 'pell-button-justifyFull',
    title: 'Justify Full',
    result: () => exec('justifyFull')
  },
  justifyLeft: {
    icon: 'L',
    title: 'Justify Left',
    result: () => exec('justifyLeft')
    showInPopUp: true,
    },
  justifyRight: {
    icon: 'R',
    title: 'Justify Right',
    result: () => exec('justifyRight')
    id: 'pell-button-ulist',
    showInPopUp: true,
    id: 'pell-button-olist',
    showInPopUp: false,
    id: 'pell-button-quote',
    showInPopUp: false,
    id: 'pell-button-code',
    showInPopUp: false,
    id: 'pell-button-link',
    showInPopUp: true,
    id: 'pell-button-image',
  },
  // subscript: {
  //   icon: '_',
  //   title: 'Subscript',
  //   result: () => exec('subscript')
  // },
  // superscript: {
  //   icon: '^',
  //   title: 'Superscript',
  //   result: () => exec('superscript')
  // },
  // fontName: {
  //   icon: 'Font Name',
  //   title: 'Font Name',
  //   result: () => exec('fontName')
  // },
  // fontSize: {
  //   icon: 'Font Size',
  //   title: 'Font Size',
  //   result: () => exec('fontSize')
  // },
  indent: {
    icon: '>',
    title: 'Indent',
    result: () => exec('indent')
  },
  outdent: {
    icon: '<',
    title: 'Outdent',
    result: () => exec('outdent')
  },
  // clearFormatting: {
  //   icon: 'CF',
  //   title: 'Clear Formatting',
  //   result: () => exec('clearFormatting')
  // },
  quote: {
    icon: '&#8220; &#8221;',
    title: 'Quote',
    result: () => exec(formatBlock, '<blockquote>')
  },
  olist: {
    icon: '&#35;',
    title: 'Ordered List',
    result: () => exec('insertOrderedList')
  },
  ulist: {
    icon: '&#8226;',
    title: 'Unordered List',
    result: () => exec('insertUnorderedList')
  },
  code: {
    icon: '&lt;/&gt;',
    title: 'Code',
    result: () => exec(formatBlock, '<pre>')
  },
  line: {
    icon: '&#8213;',
    title: 'Horizontal Line',
    result: () => exec('insertHorizontalRule')
  },
  link: {
    icon: '&#128279;',
    title: 'Link',
    result: () => {
      const url = window.prompt('Enter the link URL')
      if (url) exec('createLink', url)
    }
  },
  image: {
    icon: '&#128247;',
    title: 'Image',
    result: () => {
      const url = window.prompt('Enter the image URL')
      if (url) exec('insertImage', url)
    }
  }
}

const defaultClasses = {
  actionbar: 'pell-actionbar',
  button: 'pell-button',
  content: 'pell-content',
  selected: 'pell-button-selected'
}

export const init = settings => {
  const actions = settings.actions
    ? (
      settings.actions.map(action => {
        if (typeof action === 'string') return defaultActions[action]
        else if (defaultActions[action.name]) return { ...defaultActions[action.name], ...action }
        return action
      })
    )
    : Object.keys(defaultActions).map(action => defaultActions[action])

  const classes = { ...defaultClasses, ...settings.classes }

  const defaultParagraphSeparator = settings[defaultParagraphSeparatorString] || 'div'

  const actionbar = createElement('div')
  actionbar.className = classes.actionbar
  appendChild(settings.element, actionbar)

  const content = settings.element.content = createElement('div')
  content.contentEditable = true
  content.className = classes.content
  content.oninput = ({ target: { firstChild } }) => {
    if (firstChild && firstChild.nodeType === 3) exec(formatBlock, `<${defaultParagraphSeparator}>`)
    else if (content.innerHTML === '<br>') content.innerHTML = ''
    settings.onChange(content.innerHTML)
  }
  content.onkeydown = event => {
    if (event.key === 'Tab') {
      event.preventDefault()
    } else if (event.key === 'Enter' && queryCommandValue(formatBlock) === 'blockquote') {
      setTimeout(() => exec(formatBlock, `<${defaultParagraphSeparator}>`), 0)
    }
  }
  window.onclick = event => pellContextMenu.hide()
  window.onblur = event => pellContextMenu.hide()
  content.oncontextmenu = event => {
    event.preventDefault();
    pellContextMenu.clean();

    pellContextMenu.generate('defaults', event);

    if (event.target.tagName == 'IMG') {
      pellContextMenu.generate('widths', event);
    }

    pellContextMenu.show(event.clientX, event.clientY);
  }
  appendChild(settings.element, content)

  actions.forEach(action => {
    const button = createElement('button')
    button.setAttribute('id', action.id)
    button.className = classes.button
    button.innerHTML = action.icon
    button.title = action.title
    button.setAttribute('type', 'button')
    button.onclick = () => action.result() && content.focus()
    button.setAttribute('data-showinpopup', action.showInPopUp)

    if (action.state) {
      const handler = () => button.classList[action.state() ? 'add' : 'remove'](classes.selected)
      addEventListener(content, 'keyup', handler)
      addEventListener(content, 'mouseup', handler)
      addEventListener(button, 'click', handler)
    }

    appendChild(actionbar, button)
  })

  if (settings.styleWithCSS) exec('styleWithCSS')
  exec(defaultParagraphSeparatorString, defaultParagraphSeparator)

  return settings.element
}

export default { exec, init }
