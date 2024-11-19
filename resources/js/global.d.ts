import {ComponentStore} from "./services/components";
import {EventManager} from "./services/events";
import {HttpManager} from "./services/http";
import {Translator} from "./services/translations";
import {MarkdownEnhancement} from "./services/markdownEnhancement";

declare global {
    const __DEV__: boolean;

    interface Window {
        $components: ComponentStore;
        $events: EventManager;  
        $trans: Translator;
        $http: HttpManager;
        $markdownEnhancement: MarkdownEnhancement;
        baseUrl: (path: string) => string;
    }
}