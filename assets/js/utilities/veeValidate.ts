import { extend } from 'vee-validate';
import {required, integer, numeric, image} from 'vee-validate/dist/rules';

//vee-validate rules
extend('required', {
    ...required,
    message: 'ce champs est obligatoire'
});
extend('integer', {
    ...integer,
    message: 'ce champs est un entier'
});
extend('numeric', {
    ...numeric,
    message: 'ce champs est numeric'
});
extend('image', {
    ...image,
    message: 'ce champs est doit etre une image'
});