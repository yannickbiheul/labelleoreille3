/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
import './styles/nav.scss';
import './styles/banniere.scss';
import './styles/presentation.scss';
import './styles/footer.scss';
import './styles/prestations.scss';
import './styles/contact.scss';

// You can specify which plugins you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// ..
AOS.init();