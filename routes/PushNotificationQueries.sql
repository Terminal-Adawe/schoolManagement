select * from applicationProperties where `key` = 'gateway.api.service_down' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service');

update applicationProperties set `value` = "false" where `key` = 'gateway.api.service_down' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service') limit 1;

select * from applicationProperties where `key` = 'gateway.api.service_downtime_status_code';

insert into applicationProperties (`key`,`value`,`description`,microServiceModuleID,active,createdBy) values ('gateway.api.service_downtime_status_code',5050,'gateway.api.service_downtime_status_code',142,1,1);

select * from applicationProperties where `key` = 'gateway.api.service_downtime_status_code' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service');


update applicationProperties set `value` = "5051" where `key` = 'gateway.api.service_downtime_status_code' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service') limit 1;


----- This updates the interval period for which a user can receive a notification. i.e. a user can receive a notification once during this period.

select * from applicationProperties where `key` = 'gateway.api.notificationInterval_milliseconds';

insert into applicationProperties (`key`,`value`,`description`,microServiceModuleID,active,createdBy) values ('gateway.api.notificationInterval_milliseconds',60000,'gateway.api.notificationInterval_milliseconds',142,1,1);


----- This updates the number of notifications a user is to receive.

select * from applicationProperties where `key` = 'gateway.api.notificationFrequency_count';


insert into applicationProperties (`key`,`value`,`description`,microServiceModuleID,active,createdBy) values ('gateway.api.notificationFrequency_count',5,'gateway.api.notificationFrequency_count',142,1,1);


----- In the API DB to check response Codes

select * from statusCodes where statusCode like '505%';



---- Update response templates to change banner image ----

update responseTemplates set responseMessage = "Dear Valued Client,

You may experience intermittent disruptions with our Mobile APP. Our Cards, USSD, Ecobank Online and ATMs are however available for transactions. We apologize for the inconvenience.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1594832486/300x300px/PNG/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 121;


update responseTemplates set responseMessage = "Cher Precieux Client,
Vous pourriez noter des perturbations intermittentes en utilisant notre APPLI Mobile. Nos Cartes, Code USSD, Plateformes Ecobank Online et GAB sont disponibles pour vos transactions. Nous regrettons tout desagrement cause.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174725/service%20banners/fr/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 125;


update responseTemplates set responseMessage = "Dear Valued Client, You may experience intermittent disruptions with our Mobile APP. Our Cards, USSD, Ecobank Online and ATMs are however available for transactions. We apologize for the inconvenience.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174708/service%20banners/es/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 126;

update responseTemplates set responseMessage = "Estimado Cliente,
Poderia experienciar perturbacoes intermitentes em nossa APP Movel. Os nossos Cartoes, Codigo USSD, Plataformas Ecobank Online e ATM estão disponiveis para as vossas transacoes. Lamentamos o inconveniente.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174808/service%20banners/pt/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 126;




update responseTemplates set responseMessage = "Dear Valued Client,

You may experience intermittent disruptions with our Mobile APP. Our Cards, USSD, Ecobank Online and ATMs are however available for transactions. We apologize for the inconvenience.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1594832487/300x300px/PNG/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 122;


update responseTemplates set responseMessage = "Cher Precieux Client,
Vous pourriez noter des perturbations intermittentes en utilisant notre APPLI Mobile. Nos Cartes, Code USSD, Plateformes Ecobank Online et GAB sont disponibles pour vos transactions. Nous regrettons tout desagrement cause.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174725/service%20banners/fr/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 128;


update responseTemplates set responseMessage = "Dear Valued Client,
You may experience intermittent disruptions with our Mobile APP. Our Cards, USSD, Ecobank Online and ATMs are however available for transactions. We apologize for the inconvenience.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174708/service%20banners/es/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 129;

update responseTemplates set responseMessage = "Estimado Cliente, Poderia experienciar perturbacoes intermitentes em nossa APP Movel. Os nossos Cartoes, Codigo USSD, Plataformas Ecobank Online e ATM estão disponiveis para as vossas transacoes. Lamentamos o inconveniente.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174808/service%20banners/pt/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 130;





update responseTemplates set responseMessage = "Dear Valued Client,

You may experience intermittent disruptions with our Mobile APP. Our Cards, USSD, Ecobank Online and ATMs are however available for transactions. We apologize for the inconvenience.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1594832488/300x300px/PNG/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 123;


update responseTemplates set responseMessage = "Cher Precieux Client,
Vous pourriez noter des perturbations intermittentes en utilisant notre APPLI Mobile. Nos Cartes, Code USSD, Plateformes Ecobank Online et GAB sont disponibles pour vos transactions. Nous regrettons tout desagrement cause.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174726/service%20banners/fr/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 131;


update responseTemplates set responseMessage = "Estimado Cliente,
Poderia experienciar perturbacoes intermitentes em nossa APP Movel. Os nossos Cartoes, Codigo USSD, Plataformas Ecobank Online e ATM estão disponiveis para as vossas transacoes. Lamentamos o inconveniente.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174808/service%20banners/pt/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 133;

update responseTemplates set responseMessage = "Cher Precieux Client,
Vous pourriez noter des perturbations intermittentes en utilisant notre APPLI Mobile. Nos Cartes, Code USSD, Plateformes Ecobank Online et GAB sont disponibles pour vos transactions. Nous regrettons tout desagrement cause.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174726/service%20banners/fr/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 134;






update responseTemplates set responseMessage = "Dear Valued Client,
You may experience intermittent disruptions with our Mobile APP. Our Cards, USSD, Ecobank Online and ATMs are however available for transactions. We apologize for the inconvenience.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174683/service%20banners/en/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 124;


update responseTemplates set responseMessage = "Cher Precieux Client,
Vous pourriez noter des perturbations intermittentes en utilisant notre APPLI Mobile. Nos Cartes, Code USSD, Plateformes Ecobank Online et GAB sont disponibles pour vos transactions. Nous regrettons tout desagrement cause.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174726/service%20banners/fr/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 135;


update responseTemplates set responseMessage = "Dear Valued Client,
You may experience intermittent disruptions with our Mobile APP. Our Cards, USSD, Ecobank Online and ATMs are however available for transactions. We apologize for the inconvenience.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174708/service%20banners/es/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 136;

update responseTemplates set responseMessage = "Estimado Cliente,
Poderia experienciar perturbacoes intermitentes em nossa APP Movel. Os nossos Cartoes, Codigo USSD, Plataformas Ecobank Online e ATM estão disponiveis para as vossas transacoes. Lamentamos o inconveniente.#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174808/service%20banners/pt/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg" where responseID = 137;





INSERT INTO `responseTemplates` (`languageID`, `statusCodeID`, `responseMessage`, `active`, `createdBy`, `modifiedBy`) VALUES ('2', (select statusCodeID from statusCodes where statusCode = '5054'), 'Banner#https://res.cloudinary.com/dflv8gwxt/image/upload/v1597174726/service%20banners/fr/9990_GRP_BANK_CARDS_SUMMER_2020_Skull_300x300px_P_EN_v3.jpg', '1', '1', '1');


/* Activate Push Notification */


/* API DB */
UPDATE responseTemplates set responseMessage = "" where statuscodeid in (select statuscodeid from statusCodes where statuscode = '5052') and languageID = 1;

/* French */
UPDATE responseTemplates set responseMessage = "" where statuscodeid in (select statuscodeid from statusCodes where statuscode = '5052') and languageID = 2;

/* Spanish */
UPDATE responseTemplates set responseMessage = "" where statuscodeid in (select statuscodeid from statusCodes where statuscode = '5052') and languageID = 3;

/* Portuguese */
UPDATE responseTemplates set responseMessage = "" where statuscodeid in (select statuscodeid from statusCodes where statuscode = '5052') and languageID = 4;

/* Wallet DB */
/* Set the status code or message to display */
update applicationProperties set `value` = "5052" where `key` = 'gateway.api.service_downtime_status_code' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service') limit 1;

/* set frequency of notification */
update applicationProperties set `value` = "3" where `key` = 'gateway.api.notificationFrequency_count' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service');

/* set time */
update applicationProperties set `value` = "21600000" where `key` = 'gateway.api.notificationInterval_milliseconds' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service');

/* Activate push Notification */
update applicationProperties set `value` = "true" where `key` = 'gateway.api.service_down' and microServiceModuleID = (select microServiceModuleID from microServiceModules where application = 'gateway-core-service') limit 1;


/* The above means the alert will show after every 6 hours for 3 times */

