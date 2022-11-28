import {Markdown} from "./markdown";
import {Display} from "./display";
import {Actions} from "./actions";
import {Settings} from "./settings";
import {listen} from "./common-events";
import {init as initCodemirror} from "./codemirror";


/**
 * Initiate a new markdown editor instance.
 * @param {MarkdownEditorConfig} config
 * @returns {Promise<MarkdownEditor>}
 */
export async function init(config) {

    /**
     * @type {MarkdownEditor}
     */
    const editor = {
        config,
        markdown: new Markdown(),
        settings: new Settings(config.settings),
    };

    editor.actions = new Actions(editor);
    editor.display = new Display(editor);
    editor.cm = await initCodemirror(editor);

    listen(editor);

    return editor;
}


/**
 * @typedef MarkdownEditorConfig
 * @property {String} pageId
 * @property {Element} container
 * @property {Element} displayEl
 * @property {HTMLTextAreaElement} inputEl
 * @property {String} drawioUrl
 * @property {Object<String, String>} text
 * @property {Object<String, any>} settings
 */

/**
 * @typedef MarkdownEditor
 * @property {MarkdownEditorConfig} config
 * @property {Display} display
 * @property {Markdown} markdown
 * @property {Actions} actions
 * @property {CodeMirror} cm
 * @property {Settings} settings
 */