<?php 
// Employment
@Type = JobPosting

// Staff

// Services
@type = Service
@type = ServiceChannel
@type = Offer
    
// Audience & Featured Items
@type = ItemList
@type = Audience
@type = Language
@type = Schedule
    
// Actions

@type = PotentialAction
    Donate



@type = Organization
    @type = Brand
    @type = ContactPoint
    @type = PostalAddress (address)
    @type = GeoShape (areaServed)
    @type = Person (employee)
    @type = Event (events)

    @type = OfferCatalog (hasOfferCatalog)
    @type = ImageObject (logo)
    @type = Offer (makesOffer)
    
    @type = QuantitativeValue (numberOfEmployees)
    @type = Review (reviews) or @type = AggregateRating (aggregateRating)
    
    @type = ImageObject (image)
    @type = Action (potentialAction)
    url = sameAs (list)
    url = url
    text = name
    text = description
    text = telephone
    text = faxNumber
    text = email
    text = awards (list)
    text = taxID
    text = naics
    text = duns
    
    
    // Optional Organization
    @type = Organization (department or subOrganization)
    @type = Person (founder)
    @type = Date (foundingDate)
    @type = Place (foundingLocation)
    @type = Organization (funder)
    @type = Organization (sponsor)
    @type = Organization (members)
    @type = Organization (memberOf)
    @type = Demand (seeks)
    text = alternateName
    text = disambiguatingDescription
    text = identifier


?>

// Find more Options for Contact Language
// Don't forget Hours for the ContactPoint
