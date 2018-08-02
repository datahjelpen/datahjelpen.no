const defaultParagraphSeparatorString = 'defaultParagraphSeparator'
const formatBlock = 'formatBlock'
const addEventListener = (parent, type, listener) => parent.addEventListener(type, listener)
const appendChild = (parent, child) => parent.appendChild(child)
const createElement = tag => document.createElement(tag)
const queryCommandState = command => document.queryCommandState(command)
const queryCommandValue = command => document.queryCommandValue(command)

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
  },
  bold: {
    icon: '<strong>B</strong>',
    title: 'Bold',
    state: () => queryCommandState('bold'),
    result: () => exec('bold')
  },
  italic: {
    icon: '<em>I</em>',
    title: 'Italic',
    state: () => queryCommandState('italic'),
    result: () => exec('italic')
  },
  underline: {
    icon: '<u>U</u>',
    title: 'Underline',
    state: () => queryCommandState('underline'),
    result: () => exec('underline')
  },
  strikethrough: {
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
  },
  paragraph: {
    icon: '&#182;',
    title: 'Paragraph',
    result: () => exec(formatBlock, '<p>')
  },
  justifyCenter: {
    icon: 'C',
    title: 'Justify Center',
    result: () => exec('justifyCenter')
  },
  justifyFull: {
    icon: 'J',
    title: 'Justify Full',
    result: () => exec('justifyFull')
  },
  justifyLeft: {
    icon: 'L',
    title: 'Justify Left',
    result: () => exec('justifyLeft')
  },
  justifyRight: {
    icon: 'R',
    title: 'Justify Right',
    result: () => exec('justifyRight')
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
  appendChild(settings.element, content)

  actions.forEach(action => {
    const button = createElement('button')
    button.className = classes.button
    button.innerHTML = action.icon
    button.title = action.title
    button.setAttribute('type', 'button')
    button.onclick = () => action.result() && content.focus()

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
