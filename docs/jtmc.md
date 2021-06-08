ROLE: name, role
possess, NN INFORMATION_PAYMENT, NN STORE
INFORMATION_PAYMENT: payment_types

associate, 1N ROLE, 11 USER
STORE: store activity, picture, name, siret, address, postal_code, email, phone, website, open_days, open_hours, description
have, NN STORE, NN COMMERCIAL_SERVICE

USER: email, password
register, 1N USER, 11 STORE
COMMERCIAL_SERVICE: commercial_types