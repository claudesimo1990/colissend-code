import { extend } from 'vee-validate';
import { required, integer, numeric, image, max, min } from 'vee-validate/dist/rules';

extend('required', {
    ...required,
    message: "Ce champ est obligatoire"
});

extend('integer', {
    ...integer,
    message: 'Ce champs est un entier'
});

extend('numeric', {
    ...numeric,
    message: 'Ce champs est numeric'
});

extend('maximun:', {
    ...max,
    message: 'La valeur taper est trop grande'
});

extend('minimun', {
    ...min,
    message: 'La valeur taper est trop petite'
});

extend('image', {
    ...image,
    message: 'Ce champs est doit etre une image'
});

