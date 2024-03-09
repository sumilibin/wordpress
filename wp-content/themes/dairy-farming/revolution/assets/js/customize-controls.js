( function( api ) {

	// Extends our custom "dairy-farming" section.
	api.sectionConstructor['dairy-farming'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );