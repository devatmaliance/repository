<?php

namespace Devatmaliance\Repository;

class Entity
{
    public const DEVICE = 'device';
    public const REQUEST = 'request';
    public const ENGINEERACTIVITY = 'engineeractivity';
    public const ESTPMATRIXWARNINGCORRIDOR = 'estpmatrixwarningcorridor';
    public const ESTPMAXCORRIDOR = 'estpmaxcorridor';
    public const ACTDEPARTMENT = 'actdepartment';
    public const ADDRESSCOORDINATES = 'addresscoordinates';
    public const CITY = 'city';
    public const CONTRACT = 'contract';
    public const CONTRACTCATEGORY = 'contractcategory';
    public const CONTRACTINCOME = 'contractincome';
    public const CONTRACTSETTINGS = 'contractsettings';
    public const CONTRACTSGROUP = 'contractsgroup';
    public const CONTRACTTERRITORYSUBCONTRACTOR = 'contractterritorysubcontractor';
    public const CONTRACTTICKETSTATUS = 'contractticketstatus';
    public const CONTRACTUSER = 'contractuser';
    public const COORDINATEPAIR = 'coordinatepair';
    public const DELIVERYCOMPANY = 'deliverycompany';
    public const DELIVERYORDER = 'deliveryorder';
    public const DELIVERYORDERHISTORY = 'deliveryorderhistory';
    public const DEVICEMODEL = 'devicemodel';
    public const DEVICEMODELCATEGORY = 'devicemodelcategory';
    public const DEVICEMODULE = 'devicemodule';
    public const DEVICEMODULECATEGORYPARENT = 'devicemodulecategoryparent';
    public const DEVICEMODULECATEGORYPATH = 'devicemodulecategorypath';
    public const DEVICEMODULEPARENT = 'devicemoduleparent';
    public const DEVICEPARTNUMBERPHOTO = 'devicepartnumberphoto';
    public const DEVICEPARTNUMBERPRICE = 'devicepartnumberprice';
    public const DEVICEREPAIR = 'devicerepair';
    public const DEVICEREPAIRDEFECT = 'devicerepairdefect';
    public const DEVICEREPAIRDEFECTOFTENUSED = 'devicerepairdefectoftenused';
    public const DEVICEREPAIRDEVICEREPAIRDEFECT = 'devicerepairdevicerepairdefect';
    public const DEVICESPECIFICATION = 'devicespecification';
    public const DEVICESPECIFICATIONCATEGORY = 'devicespecificationcategory';
    public const DEVICESSPAREPARTSSHORTNESS = 'devicessparepartsshortness';
    public const DEVICESYNC = 'devicesync';
    public const DUTYENGINEER = 'dutyengineer';
    public const EMPLOYEEPOSITION = 'employeeposition';
    public const ENGINEERASSIGNADDRESS = 'engineerassignaddress';
    public const ENGINEERASSIGNAREA = 'engineerassignarea';
    public const ENGINEERASSIGNTERRITORY = 'engineerassignterritory';
    public const ENGINEERASSIGNTERRITORYCONTRACTLINK = 'engineerassignterritorycontractlink';
    public const ENGINEERASSIGNTERRITORYENGINEERLINKTE = 'engineerassignterritoryengineerlinktemplate;mplate';
    public const ENGINEERCOMPETENCY = 'engineercompetency';
    public const ENGINEERCOORD = 'engineercoord';
    public const ENGINEERKILOMETRAGEAGREEMENT = 'engineerkilometrageagreement';
    public const ENGINEERKILOMETRAGECOMPENSATION = 'engineerkilometragecompensation';
    public const ENGINEERMOTIVATIONRATING = 'engineermotivationrating';
    public const ENGINEERREPLACEMENTHISTORY = 'engineerreplacementhistory';
    public const ENGINEERROUTE = 'engineerroute';
    public const ENGINEERROUTECOMMENT = 'engineerroutecomment';
    public const ENGINEERSTATE = 'engineerstate';
    public const ENGINEERTIDASSIGN = 'engineertidassign';
    public const FILTERS = 'filters';
    public const FIXERACTIVITY = 'fixeractivity';
    public const FUELREMAIN = 'fuelremain';
    public const FUELSEASONADDITIONAL = 'fuelseasonadditional';
    public const HASHTAGCONTRACTEXCEPT = 'hashtagcontractexcept';
    public const HASHTAGTYPE = 'hashtagtype';
    public const HYUSONGERRORCODE = 'hyusongerrorcode';
    public const LOG = 'log';
    public const LOGBFKO = 'logbfko';
    public const LOGPROCESSOR = 'logprocessor';
    public const LOGSPECIFICATION = 'logspecification';
    public const MOTIVATIONDEPARTMENT = 'motivationdepartment';
    public const MOTIVATIONMATRIX = 'motivationmatrix';
    public const MOTIVATIONPOINTS = 'motivationpoints';
    public const MOTIVATIONRECALCULATION = 'motivationrecalculation';
    public const NOTIFICATION = 'notification';
    public const NOTIFYLOG = 'notifylog';
    public const OVERTIMEWORK = 'overtimework';
    public const PARTNUMBERDEMONTAGELEVEL = 'partnumberdemontagelevel';
    public const PARTNUMBERORDER = 'partnumberorder';
    public const PARTNUMBERORDERMODULES = 'partnumberordermodules';
    public const PICKUPPOINTDPD = 'pickuppointdpd';
    public const PLANINSTALLFN = 'planinstallfn';
    public const REGION = 'region';
    public const REPORT = 'report';
    public const REPORTRECIPIENTREPORT = 'reportrecipientreport';
    public const REQUESTACTIONINSPECT = 'requestactioninspect';
    public const REQUESTCOMMENT = 'requestcomment';
    public const REQUESTINFO = 'requestinfo';
    public const REQUESTNOTIFICATIONSTATUSHISTORY = 'requestnotificationstatushistory';
    public const REQUESTORDER = 'requestorder';
    public const REQUESTPROPERTY = 'requestproperty';
    public const RMA = 'rma';
    public const RMADEVICE = 'rmadevice';
    public const ROLE = 'role';
    public const ROLEUSER = 'roleuser';
    public const SIMCARDSYNC = 'simcardsync';
    public const SMATMODELSREPLACEABLE = 'smatmodelsreplaceable';
    public const SMSLOG = 'smslog';
    public const STOREBOX = 'storebox';
    public const STORECELL = 'storecell';
    public const STOREMANAGEMENTFN = 'storemanagementfn';
    public const STOREPROFILEDEVICEMODEL = 'storeprofiledevicemodel';
    public const STOREPROFILETYPE = 'storeprofiletype';
    public const TARGETVERSION = 'targetversion ';
    public const TECHPASSPORT = 'techpassport';
    public const TERRITORY = 'territory';
    public const TERRITORYAGREEDSTAFFING = 'territoryagreedstaffing';
    public const TERRITORYINCOMEEXPENSES = 'territoryincomeexpenses';
    public const TICKETSTATUS = 'ticketstatus';
    public const USERACTIVITY = 'useractivity';
    public const USERAUTHCODE = 'userauthcode';
    public const USERAUTHCODEINFORMATION = 'userauthcodeinformation';
    public const USERNOTIFICATION = 'usernotification';
    public const USERPARAMS = 'userparams';
    public const USERTEMPLATEPARAMS = 'usertemplateparams';
    public const WEEKEND = 'weekend';
    public const WGLOBALCONSTANTS = 'wglobalconstants';
    public const WORKSCHEDULEENGINEER = 'workscheduleengineer';
    public const WORKSCHEDULEENGINEERTEMPLATE = 'workscheduleengineertemplate';
    public const WORKTIME = 'worktime';
    public const WORKTYPE = 'worktype';
    public const TICKETSTATISTIC = 'ticketstatistic';
    public const LOGAPI = 'logapi';
    public const LOGAUTH = 'logauth';
    public const LOGEMAIL = 'logemail';
    public const LOGERROR = 'logerror';
    public const LOGMODEL = 'logmodel';
    public const LOGSBERREPAIR = 'logsberrepair';
    public const LOGSCHEDULE = 'logschedule';
    public const ENGINEERSTATUS = 'engineerstatus';
    public const ABSTRACTNOMENCLATURE = 'abstractnomenclature';
    public const NOMENCLATUREMODELCATEGORY = 'nomenclaturemodelcategory';
    public const ENGINEERINGTESTING = 'engineeringtesting';
    public const TESTING = 'testing';
    public const TESTINGCOMPETENCY = 'testingcompetency';
    public const EXTENDEDCONTRACTCATEGORYINFO = 'extendedcontractcategoryinfo';
    public const TICKETPENALTY = 'ticketpenalty';
    public const TICKETSTATUSCODE = 'ticketstatuscode';
    public const TICKETTARIFF = 'tickettariff';
    public const DEVICELOCKED = 'devicelocked';
    public const ESIBPROFILE = 'esibprofile';
    public const ESTPDEVICESERVICE = 'estpdeviceservice';
    public const HISTORYESIBPROFILE = 'historyesibprofile';
    public const SHIPMENTACTSHIPMENTDEVICE = 'shipmentactshipmentdevice';
    public const SHIPMENTACTSHIPMENTSIMCARD = 'shipmentactshipmentsimcard';
    public const MOBILEAPPSTATISTIC = 'mobileappstatistic';
    public const AGREEMENT = 'agreement';
    public const AGREEMENTAGREE = 'agreementagree';
    public const ALTERNATIVEMODELNAME = 'alternativemodelname';
    public const ATMDEPARTMENTTERRITORYCONTRACTS = 'atmdepartmentterritorycontracts';
    public const BADEXPRESSIONCATALOG = 'badexpressioncatalog';
    public const BANK = 'bank';
    public const BANKTERMINALOWNERS = 'bankterminalowners';
    public const BANKTERMINALOWNERSDEVICEMODEL = 'bankterminalownersdevicemodel';
    public const BANKTERMINALOWNERSSETTINGS = 'bankterminalownerssettings';
    public const CAPABILITIES = 'capabilities';
    public const CLEANINGSCHEDULE = 'cleaningschedule';
    public const COMPANY = 'company';
    public const COMPONENT = 'component';
    public const COMPONENTSTYPE = 'componentstype';
    public const CONFIRMATION = 'confirmation';
    public const CONFIRMATIONREQUEST = 'confirmationrequest';
    public const CONTACTSESTP = 'contactsestp';
    public const CONTRACTDEPARTMENT = 'contractdepartment';
    public const CONTRACTSCATSDEVICES = 'contractscatsdevices';
    public const CONTRACTSDEPARTMENT = 'contractsdepartment';
    public const CONTRACTTEMPLATEENTRY = 'contracttemplateentry';
    public const CRASHTYPES = 'crashtypes';
    public const DEFECT = 'defect';
    public const DELIVERYROUTES = 'deliveryroutes';
    public const DEPARTMENTDOCUMENT = 'departmentdocument';
    public const DEPARTMENTDOCUMENTSCAN = 'departmentdocumentscan';
    public const DEPARTMENTZSB = 'departmentzsb';
    public const DEVICEDEFECT = 'devicedefect';
    public const DEVICEFNCONTROL = 'devicefncontrol';
    public const DEVICEINFO = 'deviceinfo';
    public const DEVICEINFOFIELDS = 'deviceinfofields';
    public const DEVICEINVENTORY = 'deviceinventory';
    public const DEVICEINVENTORYIMAGE = 'deviceinventoryimage';
    public const DEVICEMODELCOMMUNICATIONTYPE = 'devicemodelcommunicationtype';
    public const DEVICEMODELDEVICEMODELCOMMUNICATIONTYPE = 'devicemodeldevicemodelcommunicationtype';
    public const DEVICEMODELINSTALLTYPE = 'devicemodelinstalltype';
    public const DEVICEMODELITEM = 'devicemodelitem';
    public const DEVICEMODULECATEGORY = 'devicemodulecategory';
    public const DEVICEMODULEMODEL = 'devicemodulemodel';
    public const DEVICEPARTNUMBER = 'devicepartnumber';
    public const DEVICEPARTNUMBERATTRIBUTE = 'devicepartnumberattribute';
    public const DEVICEPARTNUMBERTYPES = 'devicepartnumbertypes';
    public const DEVICEREGISTER = 'deviceregister';
    public const DEVICEREGISTERIMAGE = 'deviceregisterimage';
    public const DEVICEREPAIRACT = 'devicerepairact';
    public const DEVICEREPAIRBANKDEVICE = 'devicerepairbankdevice';
    public const DEVICEREPAIRBIN = 'devicerepairbin';
    public const DEVICEREPAIRBINHISTORY = 'devicerepairbinhistory';
    public const DEVICEREPAIRCLIENT = 'devicerepairclient';
    public const DEVICEREPAIRDEVICEREPAIRWORK = 'devicerepairdevicerepairwork';
    public const DEVICEREPAIRHISTORY = 'devicerepairhistory';
    public const DEVICEREPAIRPACKAGING = 'devicerepairpackaging';
    public const DEVICEREPAIRSTATEMENT = 'devicerepairstatement';
    public const DEVICEREPAIRSTATEMENTDEVICES = 'devicerepairstatementdevices';
    public const DEVICEREPAIRWORK = 'devicerepairwork';
    public const DEVICESERIALHISTORY = 'deviceserialhistory';
    public const DEVICESREPAIRWORKSDEVICESMODELS = 'devicesrepairworksdevicesmodels';
    public const DEVICESRESERVE = 'devicesreserve';
    public const DEVICESTYPES = 'devicestypes';
    public const DOCUMENTPHOTO = 'documentphoto';
    public const DOCUMENTTYPE = 'documenttype';
    public const ENGINEERASSIGNTERRITORYENGINEERLINK = 'engineerassignterritoryengineerlink';
    public const ENGINEERASSIGNTERRITORYSERVICETYPELINK = 'engineerassignterritoryservicetypelink';
    public const EngineerAssignTerritoryWorkTypeLink = 'EngineerAssignTerritoryWorkTypeLink';
    public const ENGINEERCOORDIMAGE = 'engineercoordimage';
    public const ENGINEERROUTEFUEL = 'engineerroutefuel';
    public const ENGINEERSALARY = 'engineersalary';
    public const EXCHANGEDEVICES = 'exchangedevices';
    public const EXCHANGEFILE = 'exchangefile';
    public const EXCHANGEFILEEXCHANGEDEVICES = 'exchangefileexchangedevices';
    public const EXCHANGEFILEEXCHANGEREQUESTS = 'exchangefileexchangerequests';
    public const EXCHANGEREL = 'exchangerel';
    public const EXCHANGEREQUESTS = 'exchangerequests';
    public const EXTRACAPABILITIES = 'extracapabilities';
    public const FEEDBACK = 'feedback';
    public const FILTERTEMPLATE = 'filtertemplate';
    public const GROUPSTORE = 'groupstore';
    public const HASHTAG = 'hashtag';
    public const HISTORYLOG = 'historylog';
    public const HISTORYPOS = 'historypos';
    public const HISTORYPOSRESERVERDOCS = 'historyposreserverdocs';
    public const HISTORYSAFEKEEPING = 'historysafekeeping';
    public const HISTORYSIM = 'historysim';
    public const INTERNALCOMMENTS = 'internalcomments';
    public const INTERNALREQUESTINFO = 'internalrequestinfo';
    public const KKTREMINDHISTORY = 'kktremindhistory';
    public const KKTREMINDJOURNAL = 'kktremindjournal';
    public const KKTREMINDUSER = 'kktreminduser';
    public const KKTSPECIFICATION = 'kktspecification';
    public const LOGSCHEDULEMEMORYUSAGE = 'logschedulememoryusage';
    public const NOTEREQUEST = 'noterequest';
    public const NOTEREQUESTFILE = 'noterequestfile';
    public const NOTEREQUESTTYPE = 'noterequesttype';
    public const NOTIFYTYPE = 'notifytype';
    public const OVERTIMEWORKAPPROVEDHOURS = 'overtimeworkapprovedhours';
    public const PARTNUMBERORDERMODULESSHORTAGE = 'partnumberordermodulesshortage';
    public const PASSWORDSYNCSTATUS = 'passwordsyncstatus';
    public const PAYQR = 'payqr';
    public const REMINDER = 'reminder';
    public const REPORTEDFAULT = 'reportedfault';
    public const REPORTHISTORY = 'reporthistory';
    public const REPORTRECIPIENT = 'reportrecipient';
    public const REQEXCHANGE = 'reqexchange';
    public const REQTYPES = 'reqtypes';
    public const REQUESTACTION = 'requestaction';
    public const REQUESTCHANGESHISTORY = 'requestchangeshistory';
    public const REQUESTCLOSEPARAM = 'requestcloseparam';
    public const REQUESTCORRECTION = 'requestcorrection';
    public const REQUESTDOCUMENT = 'requestdocument';
    public const REQUESTDOCUMENTSCAN = 'requestdocumentscan';
    public const REQUESTDOCUMENTSCANSDISPATCH = 'requestdocumentscansdispatch';
    public const REQUESTHISTORY = 'requesthistory';
    public const REQUESTQUALITYCONTROL = 'requestqualitycontrol';
    public const REQUESTROUTE = 'requestroute';
    public const REQUESTSCSR = 'requestscsr';
    public const REQUESTSDISTANCE = 'requestsdistance';
    public const REQUESTSTATUS = 'requeststatus';
    public const REQUESTSTREAMPROPERTIES = 'requeststreamproperties';
    public const REQUESTTAG = 'requesttag';
    public const REQUESTXMLHISTORY = 'requestxmlhistory';
    public const RLOCK = 'rlock';
    public const SBERSUOESIRZIPNETTOP = 'sbersuoesirzipnettop';
    public const SERVICECENTERSTORE = 'servicecenterstore';
    public const SERVICETYPE = 'servicetype';
    public const SHIPMENT = 'shipment';
    public const SHIPMENTACT = 'shipmentact';
    public const SHIPMENTDEVICE = 'shipmentdevice';
    public const SHIPMENTMATSR = 'shipmentmatsr';
    public const SHIPMENTSIMCARDS = 'shipmentsimcards';
    public const SHIPMENTTYPE = 'shipmenttype';
    public const SICKVACATION = 'sickvacation';
    public const SICKVACATIONFILE = 'sickvacationfile';
    public const SICKVACATIONNOTIFICATION = 'sickvacationnotification';
    public const SIMCARD = 'simcard';
    public const SIMMOVESTYPES = 'simmovestypes';
    public const SIMOPERATOR = 'simoperator';
    public const SMATHISTORY = 'smathistory';
    public const SMATMODELS = 'smatmodels';
    public const SMATOST = 'smatost';
    public const SMATSR = 'smatsr';
    public const SMATSRMANUFACTURER = 'smatsrmanufacturer';
    public const SMATSRONECLINK = 'smatsroneclink';
    public const SMATSROWNERS = 'smatsrowners';
    public const SMATTYPE = 'smattype';
    public const SORTTYPE = 'sorttype';
    public const SOURCETYPE = 'sourcetype';
    public const SPECIFICATION = 'specification';
    public const STORE = 'store';
    public const STOREDEPARTMENT = 'storedepartment';
    public const STOREENGINEERS = 'storeengineers';
    public const STOREKEEPERADDSTORES = 'storekeeperaddstores';
    public const STOREPROFILE = 'storeprofile';
    public const STOREPROFILECATEGORY = 'storeprofilecategory';
    public const STOREPROFILEMATERIAL = 'storeprofilematerial';
    public const STOREPROFILEPARTNUMBER = 'storeprofilepartnumber';
    public const STOREPROFILEPOS = 'storeprofilepos';
    public const STOREPROFILESIM = 'storeprofilesim';
    public const STOREPROFILETYPECOMMUNICATIONTYPE = 'storeprofiletypecommunicationtype';
    public const SUBSCRIPTIONEVENT = 'subscriptionevent';
    public const SUBSCRIPTIONUSERCONTRACTVALUE = 'subscriptionusercontractvalue';
    public const SUBSCRIPTIONUSERS = 'subscriptionusers';
    public const TAG = 'tag';
    public const TERMINALERRORSOLUTION = 'terminalerrorsolution';
    public const TERMINALSPECIFICATIONBEELINE = 'terminalspecificationbeeline';
    public const TERMINALSPECIFICATIONGENBANK = 'terminalspecificationgenbank';
    public const TERRITORYTEMPLATEENTRY = 'territorytemplateentry';
    public const TIMELINE = 'timeline';
    public const TIMELINEVIEWS = 'timelineviews';
    public const TRACKINGDEVICEREPAIR = 'trackingdevicerepair';
    public const TSTCALL = 'tstcall';
    public const USER = 'user';
    public const USEREMPLOYMENTTYPE = 'useremploymenttype';
    public const USERPLAYER = 'userplayer';
    public const USERSDEPARTMENTS = 'usersdepartments';
    public const USERSESSION = 'usersession';
    public const VACATION = 'vacation';
    public const VACATIONFILE = 'vacationfile';
    public const VACATIONORDER = 'vacationorder';
    public const VACATIONREQUEST = 'vacationrequest';
    public const WITHDRAWNFNREPORT = 'withdrawnfnreport';
    public const WORKSCHEDULE = 'workschedule';
    public const ZIPORDER = 'ziporder';
    public const ZIPORDERREQPARTNUMBER = 'ziporderreqpartnumber';
    public const ZIPORDERSTATUSES = 'ziporderstatuses';
    public const ZIPREPAIR = 'ziprepair';
    public const DIRECTORY = 'directory';
    public const DIRECTORYMODULE = 'directorymodule';
    public const MANAGEMENTREPORT = 'managementreport';
    public const EXCHANGELOGZIP = 'exchangelogzip';
    public const ENGINEERSTATUSHISTORY = 'engineerstatushistory';
    public const OVERTIMEACTIVITYPARAMETER = 'overtimeactivityparameter';
    public const USERCOMMENT = 'usercomment';
    public const FORXML = 'forxml';
    public const WEBEXCHANGE = 'webexchange';
    public const CALL = 'call';
    public const UPLOADEDINFONAUTILUS = 'uploadedinfonautilus';
    public const PROFINDUSTRYACTION = 'profindustryaction';
    public const PROFINDUSTRYANSWER = 'profindustryanswer';
    public const PROFINDUSTRYMATRIXPARAM = 'profindustrymatrixparam';
    public const PROFINDUSTRYMEMBER = 'profindustrymember';
    public const PROFINDUSTRYQUESTION = 'profindustryquestion';
    public const PROFINDUSTRYREQUESTMATRIX = 'profindustryrequestmatrix';
    public const PROFINDUSTRYREQUESTPARAM = 'profindustryrequestparam';
    public const PROFINDUSTRYTASK = 'profindustrytask';
    public const PROFINDUSTRYTASKMATRIX = 'profindustrytaskmatrix';
    public const PROFINDUSTRYTASKSTATUS = 'profindustrytaskstatus';
    public const PROFINDUSTRYTASKSTATUSPARAM = 'profindustrytaskstatusparam';
    public const PROFINDUSTRYTASKSTATUSPARAMANSWER = 'profindustrytaskstatusparamanswer';
    public const REQUESTSSTATS = 'requestsstats';
    public const REPAIRACTS = 'repairacts';

    public static function getEntities(): array
    {
        return [
            self::DEVICE,
            self::REQUEST,
            self::ENGINEERACTIVITY,
            self::ESTPMATRIXWARNINGCORRIDOR,
            self::ESTPMAXCORRIDOR,
            self::ACTDEPARTMENT,
            self::ADDRESSCOORDINATES,
            self::CITY,
            self::CONTRACT,
            self::CONTRACTCATEGORY,
            self::CONTRACTINCOME,
            self::CONTRACTSETTINGS,
            self::CONTRACTSGROUP,
            self::CONTRACTTERRITORYSUBCONTRACTOR,
            self::CONTRACTTICKETSTATUS,
            self::CONTRACTUSER,
            self::COORDINATEPAIR,
            self::DELIVERYCOMPANY,
            self::DELIVERYORDER,
            self::DELIVERYORDERHISTORY,
            self::DEVICEMODEL,
            self::DEVICEMODELCATEGORY,
            self::DEVICEMODULE,
            self::DEVICEMODULECATEGORYPARENT,
            self::DEVICEMODULECATEGORYPATH,
            self::DEVICEMODULEPARENT,
            self::DEVICEPARTNUMBERPHOTO,
            self::DEVICEPARTNUMBERPRICE,
            self::DEVICEREPAIR,
            self::DEVICEREPAIRDEFECT,
            self::DEVICEREPAIRDEFECTOFTENUSED,
            self::DEVICEREPAIRDEVICEREPAIRDEFECT,
            self::DEVICESPECIFICATION,
            self::DEVICESPECIFICATIONCATEGORY,
            self::DEVICESSPAREPARTSSHORTNESS,
            self::DEVICESYNC,
            self::DUTYENGINEER,
            self::EMPLOYEEPOSITION,
            self::ENGINEERASSIGNADDRESS,
            self::ENGINEERASSIGNAREA,
            self::ENGINEERASSIGNTERRITORY,
            self::ENGINEERASSIGNTERRITORYCONTRACTLINK,
            self::ENGINEERASSIGNTERRITORYENGINEERLINKTE,
            self::ENGINEERCOMPETENCY,
            self::ENGINEERCOORD,
            self::ENGINEERKILOMETRAGEAGREEMENT,
            self::ENGINEERKILOMETRAGECOMPENSATION,
            self::ENGINEERMOTIVATIONRATING,
            self::ENGINEERREPLACEMENTHISTORY,
            self::ENGINEERROUTE,
            self::ENGINEERROUTECOMMENT,
            self::ENGINEERSTATE,
            self::ENGINEERTIDASSIGN,
            self::FILTERS,
            self::FIXERACTIVITY,
            self::FUELREMAIN,
            self::FUELSEASONADDITIONAL,
            self::HASHTAGCONTRACTEXCEPT,
            self::HASHTAGTYPE,
            self::HYUSONGERRORCODE,
            self::LOG,
            self::LOGBFKO,
            self::LOGPROCESSOR,
            self::LOGSPECIFICATION,
            self::MOTIVATIONDEPARTMENT,
            self::MOTIVATIONMATRIX,
            self::MOTIVATIONPOINTS,
            self::MOTIVATIONRECALCULATION,
            self::NOTIFICATION,
            self::NOTIFYLOG,
            self::OVERTIMEWORK,
            self::PARTNUMBERDEMONTAGELEVEL,
            self::PARTNUMBERORDER,
            self::PARTNUMBERORDERMODULES,
            self::PICKUPPOINTDPD,
            self::PLANINSTALLFN,
            self::REGION,
            self::REPORT,
            self::REPORTRECIPIENTREPORT,
            self::REQUESTACTIONINSPECT,
            self::REQUESTCOMMENT,
            self::REQUESTINFO,
            self::REQUESTNOTIFICATIONSTATUSHISTORY,
            self::REQUESTORDER,
            self::REQUESTPROPERTY,
            self::RMA,
            self::RMADEVICE,
            self::ROLE,
            self::ROLEUSER,
            self::SIMCARDSYNC,
            self::SMATMODELSREPLACEABLE,
            self::SMSLOG,
            self::STOREBOX,
            self::STORECELL,
            self::STOREMANAGEMENTFN,
            self::STOREPROFILEDEVICEMODEL,
            self::STOREPROFILETYPE,
            self::TARGETVERSION,
            self::TECHPASSPORT,
            self::TERRITORY,
            self::TERRITORYAGREEDSTAFFING,
            self::TERRITORYINCOMEEXPENSES,
            self::TICKETSTATUS,
            self::USERACTIVITY,
            self::USERAUTHCODE,
            self::USERAUTHCODEINFORMATION,
            self::USERNOTIFICATION,
            self::USERPARAMS,
            self::USERTEMPLATEPARAMS,
            self::WEEKEND,
            self::WGLOBALCONSTANTS,
            self::WORKSCHEDULEENGINEER,
            self::WORKSCHEDULEENGINEERTEMPLATE,
            self::WORKTIME,
            self::WORKTYPE,
            self::TICKETSTATISTIC,
            self::LOGAPI,
            self::LOGAUTH,
            self::LOGEMAIL,
            self::LOGERROR,
            self::LOGMODEL,
            self::LOGSBERREPAIR,
            self::LOGSCHEDULE,
            self::ENGINEERSTATUS,
            self::ABSTRACTNOMENCLATURE,
            self::NOMENCLATUREMODELCATEGORY,
            self::ENGINEERINGTESTING,
            self::TESTING,
            self::TESTINGCOMPETENCY,
            self::EXTENDEDCONTRACTCATEGORYINFO,
            self::TICKETPENALTY,
            self::TICKETSTATUSCODE,
            self::TICKETTARIFF,
            self::DEVICELOCKED,
            self::ESIBPROFILE,
            self::ESTPDEVICESERVICE,
            self::HISTORYESIBPROFILE,
            self::SHIPMENTACTSHIPMENTDEVICE,
            self::SHIPMENTACTSHIPMENTSIMCARD,
            self::MOBILEAPPSTATISTIC,
            self::AGREEMENT,
            self::AGREEMENTAGREE,
            self::ALTERNATIVEMODELNAME,
            self::ATMDEPARTMENTTERRITORYCONTRACTS,
            self::BADEXPRESSIONCATALOG,
            self::BANK,
            self::BANKTERMINALOWNERS,
            self::BANKTERMINALOWNERSDEVICEMODEL,
            self::BANKTERMINALOWNERSSETTINGS,
            self::CAPABILITIES,
            self::CLEANINGSCHEDULE,
            self::COMPANY,
            self::COMPONENT,
            self::COMPONENTSTYPE,
            self::CONFIRMATION,
            self::CONFIRMATIONREQUEST,
            self::CONTACTSESTP,
            self::CONTRACTDEPARTMENT,
            self::CONTRACTSCATSDEVICES,
            self::CONTRACTSDEPARTMENT,
            self::CONTRACTTEMPLATEENTRY,
            self::CRASHTYPES,
            self::DEFECT,
            self::DELIVERYROUTES,
            self::DEPARTMENTDOCUMENT,
            self::DEPARTMENTDOCUMENTSCAN,
            self::DEPARTMENTZSB,
            self::DEVICEDEFECT,
            self::DEVICEFNCONTROL,
            self::DEVICEINFO,
            self::DEVICEINFOFIELDS,
            self::DEVICEINVENTORY,
            self::DEVICEINVENTORYIMAGE,
            self::DEVICEMODELCOMMUNICATIONTYPE,
            self::DEVICEMODELDEVICEMODELCOMMUNICATIONTYPE,
            self::DEVICEMODELINSTALLTYPE,
            self::DEVICEMODELITEM,
            self::DEVICEMODULECATEGORY,
            self::DEVICEMODULEMODEL,
            self::DEVICEPARTNUMBER,
            self::DEVICEPARTNUMBERATTRIBUTE,
            self::DEVICEPARTNUMBERTYPES,
            self::DEVICEREGISTER,
            self::DEVICEREGISTERIMAGE,
            self::DEVICEREPAIRACT,
            self::DEVICEREPAIRBANKDEVICE,
            self::DEVICEREPAIRBIN,
            self::DEVICEREPAIRBINHISTORY,
            self::DEVICEREPAIRCLIENT,
            self::DEVICEREPAIRDEVICEREPAIRWORK,
            self::DEVICEREPAIRHISTORY,
            self::DEVICEREPAIRPACKAGING,
            self::DEVICEREPAIRSTATEMENT,
            self::DEVICEREPAIRSTATEMENTDEVICES,
            self::DEVICEREPAIRWORK,
            self::DEVICESERIALHISTORY,
            self::DEVICESREPAIRWORKSDEVICESMODELS,
            self::DEVICESRESERVE,
            self::DEVICESTYPES,
            self::DOCUMENTPHOTO,
            self::DOCUMENTTYPE,
            self::ENGINEERASSIGNTERRITORYENGINEERLINK,
            self::ENGINEERASSIGNTERRITORYSERVICETYPELINK,
            self::EngineerAssignTerritoryWorkTypeLink,
            self::ENGINEERCOORDIMAGE,
            self::ENGINEERROUTEFUEL,
            self::ENGINEERSALARY,
            self::EXCHANGEDEVICES,
            self::EXCHANGEFILE,
            self::EXCHANGEFILEEXCHANGEDEVICES,
            self::EXCHANGEFILEEXCHANGEREQUESTS,
            self::EXCHANGEREL,
            self::EXCHANGEREQUESTS,
            self::EXTRACAPABILITIES,
            self::FEEDBACK,
            self::FILTERTEMPLATE,
            self::GROUPSTORE,
            self::HASHTAG,
            self::HISTORYLOG,
            self::HISTORYPOS,
            self::HISTORYPOSRESERVERDOCS,
            self::HISTORYSAFEKEEPING,
            self::HISTORYSIM,
            self::INTERNALCOMMENTS,
            self::INTERNALREQUESTINFO,
            self::KKTREMINDHISTORY,
            self::KKTREMINDJOURNAL,
            self::KKTREMINDUSER,
            self::KKTSPECIFICATION,
            self::LOGSCHEDULEMEMORYUSAGE,
            self::NOTEREQUEST,
            self::NOTEREQUESTFILE,
            self::NOTEREQUESTTYPE,
            self::NOTIFYTYPE,
            self::OVERTIMEWORKAPPROVEDHOURS,
            self::PARTNUMBERORDERMODULESSHORTAGE,
            self::PASSWORDSYNCSTATUS,
            self::PAYQR,
            self::REMINDER,
            self::REPORTEDFAULT,
            self::REPORTHISTORY,
            self::REPORTRECIPIENT,
            self::REQEXCHANGE,
            self::REQTYPES,
            self::REQUESTACTION,
            self::REQUESTCHANGESHISTORY,
            self::REQUESTCLOSEPARAM,
            self::REQUESTCORRECTION,
            self::REQUESTDOCUMENT,
            self::REQUESTDOCUMENTSCAN,
            self::REQUESTDOCUMENTSCANSDISPATCH,
            self::REQUESTHISTORY,
            self::REQUESTQUALITYCONTROL,
            self::REQUESTROUTE,
            self::REQUESTSCSR,
            self::REQUESTSDISTANCE,
            self::REQUESTSTATUS,
            self::REQUESTSTREAMPROPERTIES,
            self::REQUESTTAG,
            self::REQUESTXMLHISTORY,
            self::RLOCK,
            self::SBERSUOESIRZIPNETTOP,
            self::SERVICECENTERSTORE,
            self::SERVICETYPE,
            self::SHIPMENT,
            self::SHIPMENTACT,
            self::SHIPMENTDEVICE,
            self::SHIPMENTMATSR,
            self::SHIPMENTSIMCARDS,
            self::SHIPMENTTYPE,
            self::SICKVACATION,
            self::SICKVACATIONFILE,
            self::SICKVACATIONNOTIFICATION,
            self::SIMCARD,
            self::SIMMOVESTYPES,
            self::SIMOPERATOR,
            self::SMATHISTORY,
            self::SMATMODELS,
            self::SMATOST,
            self::SMATSR,
            self::SMATSRMANUFACTURER,
            self::SMATSRONECLINK,
            self::SMATSROWNERS,
            self::SMATTYPE,
            self::SORTTYPE,
            self::SOURCETYPE,
            self::SPECIFICATION,
            self::STORE,
            self::STOREDEPARTMENT,
            self::STOREENGINEERS,
            self::STOREKEEPERADDSTORES,
            self::STOREPROFILE,
            self::STOREPROFILECATEGORY,
            self::STOREPROFILEMATERIAL,
            self::STOREPROFILEPARTNUMBER,
            self::STOREPROFILEPOS,
            self::STOREPROFILESIM,
            self::STOREPROFILETYPECOMMUNICATIONTYPE,
            self::SUBSCRIPTIONEVENT,
            self::SUBSCRIPTIONUSERCONTRACTVALUE,
            self::SUBSCRIPTIONUSERS,
            self::TAG,
            self::TERMINALERRORSOLUTION,
            self::TERMINALSPECIFICATIONBEELINE,
            self::TERMINALSPECIFICATIONGENBANK,
            self::TERRITORYTEMPLATEENTRY,
            self::TIMELINE,
            self::TIMELINEVIEWS,
            self::TRACKINGDEVICEREPAIR,
            self::TSTCALL,
            self::USER,
            self::USEREMPLOYMENTTYPE,
            self::USERPLAYER,
            self::USERSDEPARTMENTS,
            self::USERSESSION,
            self::VACATION,
            self::VACATIONFILE,
            self::VACATIONORDER,
            self::VACATIONREQUEST,
            self::WITHDRAWNFNREPORT,
            self::WORKSCHEDULE,
            self::ZIPORDER,
            self::ZIPORDERREQPARTNUMBER,
            self::ZIPORDERSTATUSES,
            self::ZIPREPAIR,
            self::DIRECTORY,
            self::DIRECTORYMODULE,
            self::MANAGEMENTREPORT,
            self::EXCHANGELOGZIP,
            self::ENGINEERSTATUSHISTORY,
            self::OVERTIMEACTIVITYPARAMETER,
            self::USERCOMMENT,
            self::FORXML,
            self::WEBEXCHANGE,
            self::CALL,
            self::UPLOADEDINFONAUTILUS,
            self::PROFINDUSTRYACTION,
            self::PROFINDUSTRYANSWER,
            self::PROFINDUSTRYMATRIXPARAM,
            self::PROFINDUSTRYMEMBER,
            self::PROFINDUSTRYQUESTION,
            self::PROFINDUSTRYREQUESTMATRIX,
            self::PROFINDUSTRYREQUESTPARAM,
            self::PROFINDUSTRYTASK,
            self::PROFINDUSTRYTASKMATRIX,
            self::PROFINDUSTRYTASKSTATUS,
            self::PROFINDUSTRYTASKSTATUSPARAM,
            self::PROFINDUSTRYTASKSTATUSPARAMANSWER,
            self::REQUESTSSTATS,
            self::REPAIRACTS,
        ];
    }

    public static function findEntity(string $entity, array $entities = []): ?string
    {
        $entity = strtolower($entity);
        $entity = substr($entity, strrpos($entity, '\\') + 1, strlen($entity));
        $entities = $entities ? $entities : self::getEntities();
        return in_array($entity, $entities) ? $entity : null;
    }
}
